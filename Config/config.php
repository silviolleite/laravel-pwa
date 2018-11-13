<?php

return [
    'name' => 'LaravelPWA',
    'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation'=> 'any',
        'icons' => [
            '72x72' => '/images/icons/icon-72x72.png',
            '96x96' => '/images/icons/icon-96x96.png',
            '128x128' => '/images/icons/icon-128x128.png',
            '144x144' => '/images/icons/icon-144x144.png',
            '152x152' => '/images/icons/icon-152x152.png',
            '192x192' => '/images/icons/icon-192x192.png',
            '384x384' => '/images/icons/icon-384x384.png',
            '512x512' => '/images/icons/icon-512x512.png',
        ]
    ]
];
