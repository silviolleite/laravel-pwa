# Laravel (PWA) Progressive Web Aplication

[![Laravel 5.x](https://img.shields.io/badge/Laravel-5.x-orange.svg)](https://laravel.com/docs/5.8)
[![Laravel 6.x](https://img.shields.io/badge/Laravel-6.x-blue.svg)](https://laravel.com/docs/6.x)
[![Laravel 7.x](https://img.shields.io/badge/Laravel-7.x-red.svg)](https://laravel.com)
[![Latest Stable Version](https://poser.pugx.org/silviolleite/laravelpwa/v/stable)](https://packagist.org/packages/silviolleite/laravelpwa)
[![Total Downloads](https://poser.pugx.org/silviolleite/laravelpwa/downloads.png)](https://packagist.org/packages/silviolleite/laravelpwa)
[![License](https://img.shields.io/github/license/mashape/apistatus.svg)](https://packagist.org/packages//silviolleite/laravelpwa)

This Laravel pakage turns your project into a [progressive web app](https://developers.google.com/web/progressive-web-apps/).  Navigating to your site on an Android phone will prompt you to add the app to your home screen.

Launching the app from your home screen will display your app.  As such, it's critical that your application provides all navigation within the HTML (no reliance on the browser back or forward button).

See too the [Laravel PWA Demo](https://github.com/silviolleite/laravel-pwa-demo)


Requirements
=====
Progressive Web Apps require HTTPS unless being served from localhost.  If you're not already using HTTPS on your site, check out [Let's Encrypt](https://letsencrypt.org/) and [ZeroSSL](https://zerossl.com/).

## Installation

Add the following to your `composer.json` file :

```json
"require": {
    "silviolleite/laravelpwa": "~2.0.3",
},
```

or execute

```bash
composer require silviolleite/laravelpwa --prefer-dist
```

### Publish

```bash
$ php artisan vendor:publish --provider="LaravelPWA\Providers\LaravelPWAServiceProvider"
```

### Configuration

Configure your app name, description, icons and splashes  in `config/laravelpwa.php`.

```php
'manifest' => [
        'name' => env('APP_NAME', 'My PWA App'),
        'short_name' => 'PWA',
        'start_url' => '/',
        'background_color' => '#ffffff',
        'theme_color' => '#000000',
        'display' => 'standalone',
        'orientation' => 'any',
        'status_bar' => 'black',
        'icons' => [
            '72x72' => [
                'path' => '/images/icons/icon-72x72.png',
                'purpose' => 'any'
            ],
            '96x96' => [
                'path' => '/images/icons/icon-96x96.png',
                'purpose' => 'any'
            ],
            '128x128' => [
                'path' => '/images/icons/icon-128x128.png',
                'purpose' => 'any'
            ],
            '144x144' => [
                'path' => '/images/icons/icon-144x144.png',
                'purpose' => 'any'
            ],
            '152x152' => [
                'path' => '/images/icons/icon-152x152.png',
                'purpose' => 'any'
            ],
            '192x192' => [
                'path' => '/images/icons/icon-192x192.png',
                'purpose' => 'any'
            ],
            '384x384' => [
                'path' => '/images/icons/icon-384x384.png',
                'purpose' => 'any'
            ],
            '512x512' => [
                'path' => '/images/icons/icon-512x512.png',
                'purpose' => 'any'
            ],
        ],
        'splash' => [
            '640x1136' => '/images/icons/splash-640x1136.png',
            '750x1334' => '/images/icons/splash-750x1334.png',
            '828x1792' => '/images/icons/splash-828x1792.png',
            '1125x2436' => '/images/icons/splash-1125x2436.png',
            '1242x2208' => '/images/icons/splash-1242x2208.png',
            '1242x2688' => '/images/icons/splash-1242x2688.png',
            '1536x2048' => '/images/icons/splash-1536x2048.png',
            '1668x2224' => '/images/icons/splash-1668x2224.png',
            '1668x2388' => '/images/icons/splash-1668x2388.png',
            '2048x2732' => '/images/icons/splash-2048x2732.png',
        ],
        'shortcuts' => [
            [
                'name' => 'Shortcut Link 1',
                'description' => 'Shortcut Link 1 Description',
                'url' => '/shortcutlink1',
                'icons' => [
                    "src" => "/images/icons/icon-72x72.png",
                    "purpose" => "any"
                ]
            ],
            [
                'name' => 'Shortcut Link 2',
                'description' => 'Shortcut Link 2 Description',
                'url' => '/shortcutlink2'
            ]
        ],
        'custom' => []
    ]
```
Obs: In the `custom` tag you can insert personalized tags to `manifest.json` like this e.g:
```php
...
'custom' => [
    'tag_name' => 'tag_value',
    'tag_name2' => 'tag_value2',
    ...
]
...
```   

Include within your `<head>` the blade directive `@laravelPWA`.
```html
<html>
<head>
    <title>My Title</title>
    ...
    @laravelPWA
</head>
<body>
    ...
    My content
    ...
</body>
</html>
```


This should include the appropriate meta tags, the link to `manifest.json` and the serviceworker script.

how this example:
```html
<!-- Web Application Manifest -->
<link rel="manifest" href="/manifest.json">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="#000000">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="yes">
<meta name="application-name" content="PWA">
<link rel="icon" sizes="512x512" href="/images/icons/icon-512x512.png">

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="apple-mobile-web-app-title" content="PWA">
<link rel="apple-touch-icon" href="/images/icons/icon-512x512.png">

<link href="/images/icons/splash-640x1136.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-750x1334.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2208.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1125x2436.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-828x1792.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1242x2688.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1536x2048.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2224.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-1668x2388.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="/images/icons/splash-2048x2732.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />

<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/images/icons/icon-512x512.png">

<script type="text/javascript">
    // Initialize the service worker
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js', {
            scope: '.'
        }).then(function (registration) {
            // Registration was successful
            console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
        }, function (err) {
            // registration failed :(
            console.log('Laravel PWA: ServiceWorker registration failed: ', err);
        });
    }
</script>
```


Troubleshooting
=====
While running the Laravel test server:

1. Verify that `/manifest.json` is being served
1. Verify that `/serviceworker.js` is being served
1. Use the Application tab in the Chrome Developer Tools to verify the progressive web app is configured correctly.
1. Use the "Add to homescreen" link on the Application Tab to verify you can add the app successfully.

The Service Worker
=====
By default, the service worker implemented by this app is:
```js
var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
    '/images/icons/splash-640x1136.png',
    '/images/icons/splash-750x1334.png',
    '/images/icons/splash-1242x2208.png',
    '/images/icons/splash-1125x2436.png',
    '/images/icons/splash-828x1792.png',
    '/images/icons/splash-1242x2688.png',
    '/images/icons/splash-1536x2048.png',
    '/images/icons/splash-1668x2224.png',
    '/images/icons/splash-1668x2388.png',
    '/images/icons/splash-2048x2732.png'
];

// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});

// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});

// Serve from Cache
self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});
```
To customize service worker functionality, update the `public_path/serviceworker.js`.

The offline view
=====
By default, the offline view is implemented in `resources/views/vendor/laravelpwa/offline.blade.php`

```html
@extends('layouts.app')

@section('content')

    <h1>You are currently not connected to any networks.</h1>

@endsection
```
To customize update this file.

## Contributing

Contributing is easy! Just fork the repo, make your changes then send a pull request on GitHub. If your PR is languishing in the queue and nothing seems to be happening, then send Silvio an [email](mailto:silviolleite@gmail.com).
