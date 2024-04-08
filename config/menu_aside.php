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
        ],[
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
    ]
];