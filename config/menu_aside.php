<?php

return [
    'admin' => [
        [
            'name' => 'dashboard',
            'title' => 'Tổng quan',
            'icon' => 'bi bi-grid',
            'route' => 'admin.index',
            'submenu' => [],
            'number' => 1
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
            'number' => 2
        ],
       
    ]
];