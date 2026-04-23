<?php

return [
    'route_prefix' => '',

    'middleware' => [
        'web',
    ],

    'registration_enabled' => true,

    'brand' => [
        'name' => env('KAIZEN_PRO_STARTER_BRAND', config('app.name', 'Kaizen Pro Starter')),
        'tagline' => 'Premium Laravel authentication and dashboard scaffolding.',
    ],

    'admin' => [
        'name' => env('KAIZEN_PRO_STARTER_ADMIN_NAME', 'Administrator'),
        'email' => env('KAIZEN_PRO_STARTER_ADMIN_EMAIL', 'admin@kaizen.test'),
        'password' => env('KAIZEN_PRO_STARTER_ADMIN_PASSWORD', 'password123'),
    ],
];
