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
       
    ]
];