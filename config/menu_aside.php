<?php

return [
    'admin' => [
        [
            'name' => 'dashboard',
            'title' => 'Dashboard',
            'icon' => 'bi bi-grid',
            'route' => 'admin.index',
            'submenu' => [],
            'number' => 1
        ],
        [
            'name' => 'banner',
            'title' => 'Banner management',
            'icon' => 'bi bi-grid',
            'route' => 'admin.banner.index',
            'submenu' => [],
            'number' => 2
        ],
        [
            'name' => 'video',
            'title' => 'Video management',
            'icon' => 'bi bi-grid',
            'route' => 'admin.video.index',
            'submenu' => [],
            'number' => 3
        ],
        [
            'name' => 'styling',
            'title' => 'Styling management',
            'icon' => 'bi bi-grid',
            'route' => 'admin.styling.index',
            'submenu' => [],
            'number' => 4
        ],
        [
            'name' => 'advertisement',
            'title' => 'Advertisement management',
            'icon' => 'bi bi-grid',
            'route' => 'admin.advertisement.index',
            'submenu' => [],
            'number' => 4
        ],
        [
            'name' => 'album',
            'title' => 'Album management',
            'icon' => 'bi bi-grid',
            'route' => 'admin.album.index',
            'submenu' => [],
            'number' => 4
        ],
        [
            'name' => 'collection',
            'title' => 'Collection management',
            'icon' => 'bi bi-grid',
            'submenu' => [
                [
                    'name' => 'category-collection',
                    'title' => 'Category collection',
                    'icon' => null,
                    'route' => 'admin.collection.index'
                ],
                [
                    'name' => 'product-collection',
                    'title' => 'Product collection',
                    'icon' => null,
                    'route' => 'admin.product-collection.index'
                ],
            ],
            'number' => 4
        ],
        [
            'name' => 'live',
            'title' => 'Live',
            'icon' => 'bi bi-cast',
            'submenu' => [
                [
                    'name' => 'live content',
                    'title' => 'Thumbnail content',
                    'icon' => 'bi bi-person-video3',
                    'route' => 'admin.live.content'
                ],
                [
                    'name' => 'live video',
                    'title' => 'Video list',
                    'icon' => 'bi bi-play-btn',
                    'route' => 'admin.live.video.list'
                ],
            ],
            'number' => 5
        ],
        [
            'name' => 'category',
            'title' => 'Category',
            'icon' => 'bi bi-view-list',
            'route' => 'admin.category.index',
            'submenu' => [],
            'number' => 5
        ],
        [
            'name' => 'product',
            'title' => 'Product',
            'icon' => 'bi bi-bag',
            'route' => 'admin.product.index',
            'submenu' => [],
            'number' => 6
        ],
        
    ]
];