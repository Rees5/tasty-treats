---
title: 'main::lang.local.menus.title'
permalink: '/:location?local/menus/:category?'
description: ''
layout: local
'[localMenu]':
    isGrouped: 1
    menusPerPage: !!float 200
    showMenuImages: 1
    menuImageWidth: !!float 95
    menuImageHeight: !!float 80
    menuCategoryWidth: !!float 1240
    menuCategoryHeight: !!float 256
    defaultLocationParam: local
    localNotFoundPage: home
    hideMenuSearch: 1
    forceRedirect: 1
---
@partial('nav/local_tabs', ['activeTab' => 'menus'])

<div class="panel">
    <div class="d-block d-sm-none">
        <div class="panel-body categories">
            @component('categories')
        </div>
    </div>

    @component('localMenu')
</div>