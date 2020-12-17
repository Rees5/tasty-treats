---
title: 'main::lang.home.title'
permalink: /
description: ''
layout: default

'[slider]':
    code: home-slider

'[localSearch]':
    hideSearch: 0
    menusPage: local/menus

'[featuredItems]':
    items: ['1','2','3','4','5',6', '7', '8', '9']
    limit: 3
    itemsPerRow: 3
    itemWidth: 400
    itemHeight: 300
---
@component('slider')
<p></p>

@component('localSearch')
<p></p>
@component('featuredItems')
<p></p>