<?php

namespace Igniter\Local\Components;

use Admin\Models\Menus_model;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Location;

class Menu extends \System\Classes\BaseComponent
{
    use \Main\Traits\UsesPage;

    protected $menuListCategories = [];

    public function defineProperties()
    {
        return [
            'isGrouped' => [
                'label' => 'Group menu items list by category',
                'type' => 'switch',
                'validationRule' => 'required|boolean',
            ],
            'menusPerPage' => [
                'label' => 'Menus Per Page',
                'type' => 'number',
                'default' => 20,
                'validationRule' => 'required|integer',
            ],
            'showMenuImages' => [
                'label' => 'Show Menu Item Images',
                'type' => 'switch',
                'default' => FALSE,
                'validationRule' => 'required|boolean',
            ],
            'menuImageWidth' => [
                'label' => 'Menu Thumb Width',
                'type' => 'number',
                'span' => 'left',
                'default' => 95,
                'validationRule' => 'integer',
            ],
            'menuImageHeight' => [
                'label' => 'Menu Thumb Height',
                'type' => 'number',
                'span' => 'right',
                'default' => 80,
                'validationRule' => 'integer',
            ],
            'menuCategoryWidth' => [
                'label' => 'Category Thumb Width',
                'type' => 'number',
                'span' => 'left',
                'default' => 1240,
                'validationRule' => 'integer',
            ],
            'menuCategoryHeight' => [
                'label' => 'Category Thumb Height',
                'type' => 'number',
                'span' => 'right',
                'default' => 256,
                'validationRule' => 'integer',
            ],
            'defaultLocationParam' => [
                'label' => 'The default location route parameter (used internally when no location is selected)',
                'type' => 'text',
                'default' => 'local',
                'validationRule' => 'string',
            ],
            'localNotFoundPage' => [
                'label' => 'lang:igniter.local::default.label_redirect',
                'type' => 'select',
                'options' => [static::class, 'getThemePageOptions'],
                'default' => 'home',
                'validationRule' => 'regex:/^[a-z0-9\-_\/]+$/i',
            ],
            'hideMenuSearch' => [
                'label' => 'Hide the menu item search form',
                'type' => 'switch',
                'default' => TRUE,
                'validationRule' => 'required|boolean',
            ],
            'forceRedirect' => [
                'label' => 'Whether to force a page redirect when no location param is present in the request URI.',
                'type' => 'switch',
                'default' => TRUE,
                'validationRule' => 'required|boolean',
            ],
        ];
    }

    public function onRun()
    {
        if ($redirect = $this->checkLocationParam())
            return $redirect;

        $this->page['menuIsGrouped'] = $this->property('isGrouped');
        $this->page['showMenuImages'] = $this->property('showMenuImages');
        $this->page['menuImageWidth'] = $this->property('menuImageWidth');
        $this->page['menuImageHeight'] = $this->property('menuImageHeight');
        $this->page['menuCategoryWidth'] = $this->property('menuCategoryWidth', 1240);
        $this->page['menuCategoryHeight'] = $this->property('menuCategoryHeight', 256);
        $this->page['menuAllergenImageWidth'] = $this->property('menuAllergenImageWidth', 28);
        $this->page['menuAllergenImageHeight'] = $this->property('menuAllergenImageHeight', 28);

        $this->page['hideMenuSearch'] = $this->property('hideMenuSearch');
        $this->page['menuSearchTerm'] = $this->getSearchTerm();

        $this->page['menuList'] = $this->loadList();
        $this->page['menuListCategories'] = $this->menuListCategories;
    }

    protected function loadList()
    {
        $list = Menus_model::with([
            'mealtimes', 'menu_options',
            'categories', 'categories.media',
            'special', 'allergens',
        ])->listFrontEnd([
            'page' => $this->param('page'),
            'pageLimit' => $this->property('menusPerPage'),
            'sort' => $this->property('sort', 'menu_priority asc'),
            'location' => $this->getLocation(),
            'category' => $this->param('category'),
            'search' => $this->getSearchTerm(),
        ]);

        $this->mapIntoObjects($list);

        if ($this->property('isGrouped'))
            $this->groupListByCategory($list);

        return $list;
    }

    protected function mapIntoObjects($list)
    {
        $collection = $list->getCollection()->map(function ($menuItem) {
            return $this->createMenuItemObject($menuItem);
        });

        $list->setCollection($collection);

        return $list;
    }

    protected function getLocation()
    {
        if (!$location = Location::current())
            return null;

        return $location->getKey();
    }

    protected function groupListByCategory($list)
    {
        $this->menuListCategories = [];

        $collection = $list->getCollection()->mapToGroups(function ($menuItemObject) {
            $categories = [];
            foreach ($menuItemObject->model->categories as $category) {
                $this->menuListCategories[$category->getKey()] = $category;
                $categories[$category->getKey()] = $menuItemObject;
            }

            if (!$categories)
                $categories[] = $menuItemObject;

            return $categories;
        })->sortBy(function ($menuItems, $categoryId) {
            if (isset($this->menuListCategories[$categoryId]))
                return $this->menuListCategories[$categoryId]->priority;

            return $categoryId;
        });

        $list->setCollection($collection);
    }

    protected function checkLocationParam()
    {
        if (!$this->property('forceRedirect', TRUE))
            return;

        $param = $this->param('location', 'local');
        if (is_single_location() AND $param === $this->property('defaultLocationParam', 'local'))
            return;

        if (Location::getBySlug($param))
            return;

        return Redirect::to($this->controller->pageUrl($this->property('localNotFoundPage')));
    }

    public function getSearchTerm()
    {
        if ($this->property('hideMenuSearch'))
            return '';

        return Request::query('q');
    }

    public function createMenuItemObject($menuItem)
    {
        $object = new \stdClass();

        $object->specialIsActive = ($menuItem->special AND $menuItem->special->active());
        $object->specialDaysRemaining = optional($menuItem->special)->daysRemaining();

        $object->menuPrice = $object->specialIsActive
            ? $menuItem->special->getMenuPrice($menuItem->menu_price)
            : $menuItem->menu_price;

        $object->hasThumb = $menuItem->hasMedia('thumb');
        $object->hasOptions = $menuItem->hasOptions();

        $mealtimes = optional($menuItem->mealtimes)->where('mealtime_status', 1);
        $object->hasMealtime = count($mealtimes);
        $object->mealtimeIsNotAvailable = !$menuItem->isAvailable(Location::instance()->orderDateTime());

        $object->mealtimeTitles = [];
        foreach ($mealtimes ?? [] as $mealtime) {
            $object->mealtimeTitles[] = sprintf(
                lang('igniter.local::default.text_mealtime'),
                $mealtime->mealtime_name,
                $mealtime->start_time,
                $mealtime->end_time
            );
        }

        $object->model = $menuItem;

        return $object;
    }
}
