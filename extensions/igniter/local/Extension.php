<?php

namespace Igniter\Local;

use Admin\DashboardWidgets\Charts;
use Admin\Models\Locations_model;
use Admin\Models\Orders_model;
use Igniter\Local\Classes\Location;
use Igniter\Local\Listeners\MaxOrderPerTimeslotReached;
use Igniter\Local\Models\Reviews_model;
use Igniter\Local\Models\ReviewSettings;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;

class Extension extends \System\Classes\BaseExtension
{
    public function register()
    {
        $this->app->singleton('location', Location::class);

        $aliasLoader = AliasLoader::getInstance();
        $aliasLoader->alias('Location', Facades\Location::class);
    }

    public function boot()
    {
        Event::subscribe(MaxOrderPerTimeslotReached::class);

        Event::listen('router.beforeRoute', function ($url, $router) {
            View::share('showReviews', ReviewSettings::get('allow_reviews', FALSE) == TRUE);
        });

        $this->addReviewsRelationship();
        $this->addAssetsToReviewsSettingsPage();
        $this->extendDashboardChartsDatasets();
    }

    public function registerCartConditions()
    {
        return [
            'Igniter\Local\CartConditions\Delivery' => [
                'name' => 'delivery',
                'label' => 'lang:igniter.local::default.text_delivery',
                'description' => 'lang:igniter.local::default.help_delivery_condition',
            ],
        ];
    }

    public function registerComponents()
    {
        return [
            'Igniter\Local\Components\LocalBox' => [
                'code' => 'localBox',
                'name' => 'lang:igniter.local::default.component_title',
                'description' => 'lang:igniter.local::default.component_desc',
            ],
            'Igniter\Local\Components\Search' => [
                'code' => 'localSearch',
                'name' => 'lang:igniter.local::default.search.component_title',
                'description' => 'lang:igniter.local::default.search.component_desc',
            ],
            'Igniter\Local\Components\Menu' => [
                'code' => 'localMenu',
                'name' => 'lang:igniter.local::default.menu.component_title',
                'description' => 'lang:igniter.local::default.menu.component_desc',
            ],
            'Igniter\Local\Components\Categories' => [
                'code' => 'categories',
                'name' => 'lang:igniter.local::default.categories.component_title',
                'description' => 'lang:igniter.local::default.categories.component_desc',
            ],
            'Igniter\Local\Components\Review' => [
                'code' => 'localReview',
                'name' => 'lang:igniter.local::default.review.component_title',
                'description' => 'lang:igniter.local::default.review.component_desc',
            ],
            'Igniter\Local\Components\Info' => [
                'code' => 'localInfo',
                'name' => 'lang:igniter.local::default.info.component_title',
                'description' => 'lang:igniter.local::default.info.component_desc',
            ],
            'Igniter\Local\Components\Gallery' => [
                'code' => 'localGallery',
                'name' => 'lang:igniter.local::default.gallery.component_title',
                'description' => 'lang:igniter.local::default.gallery.component_desc',
            ],
            'Igniter\Local\Components\LocalList' => [
                'code' => 'localList',
                'name' => 'lang:igniter.local::default.list.component_title',
                'description' => 'lang:igniter.local::default.list.component_desc',
            ],
        ];
    }

    public function registerImportExport()
    {
        return [
            'import' => [
                'menus' => [
                    'label' => 'Import Menu Items',
                    'model' => 'Igniter\Local\Models\MenuImport',
                    'configFile' => '$/igniter/local/models/config/menuimport',
                ],
            ],
            'export' => [
                'menus' => [
                    'label' => 'Export Menu Items',
                    'model' => 'Igniter\Local\Models\MenuExport',
                    'configFile' => '$/igniter/local/models/config/menuexport',
                ],
            ],
        ];
    }

    public function registerNavigation()
    {
        return [
            'sales' => [
                'child' => [
                    'reviews' => [
                        'priority' => 30,
                        'class' => 'reviews',
                        'href' => admin_url('igniter/local/reviews'),
                        'title' => lang('lang:igniter.local::default.reviews.side_menu'),
                        'permission' => 'Admin.Reviews',
                    ],
                ],
            ],
        ];
    }

    public function registerPermissions()
    {
        return [
            'Admin.Reviews' => [
                'description' => 'lang:igniter.local::default.reviews.permissions',
                'group' => 'module',
            ],
        ];
    }

    public function registerSettings()
    {
        return [
            'reviewsettings' => [
                'label' => 'lang:igniter.local::default.reviews.text_settings',
                'icon' => 'fa fa-map-marker',
                'description' => 'lang:igniter.local::default.reviews.text_settings_description',
                'model' => 'Igniter\Local\Models\ReviewSettings',
                'permissions' => ['Admin.Reviews'],
            ],
        ];
    }

    protected function extendDashboardChartsDatasets()
    {
        Event::listen('admin.charts.extendDatasets', function ($widget) {
            if (!$widget instanceof Charts)
                return;

            $widget->contextDefinitions['reviews'] = [
                'label' => 'lang:igniter.local::default.reviews.text_title',
                'color' => '#FFB74D',
                'model' => Reviews_model::class,
                'column' => 'date_added',
            ];
        });
    }

    protected function addAssetsToReviewsSettingsPage()
    {
        Event::listen('admin.form.extendFieldsBefore', function ($form) {
            if (!$form->model instanceof ReviewSettings)
                return;

            $form->addJs('~/app/admin/formwidgets/repeater/assets/vendor/sortablejs/Sortable.min.js', 'sortable-js');
            $form->addJs('~/app/admin/formwidgets/repeater/assets/vendor/sortablejs/jquery-sortable.js', 'jquery-sortable-js');
            $form->addJs('~/app/admin/assets/js/ratings.js', 'ratings-js');
        });
    }

    protected function addReviewsRelationship(): void
    {
        Relation::morphMap([
            'reviews' => 'Igniter\Local\Models\Reviews_model',
        ]);

        Orders_model::extend(function ($model) {
            $model->relation['morphMany']['review'] = ['Igniter\Local\Models\Reviews_model'];
        });

        Locations_model::extend(function ($model) {
            $model->relation['hasMany']['reviews'] = ['Igniter\Local\Models\Reviews_model'];
        });

        Locations_model::addSortingColumns(['reviews_count asc', 'reviews_count desc']);
    }
}
