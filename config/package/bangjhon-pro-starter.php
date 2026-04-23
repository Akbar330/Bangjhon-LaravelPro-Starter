<?php

return [
    'route_prefix' => '',

    'middleware' => [
        'web',
    ],

    'registration_enabled' => true,

    'brand' => [
        'name' => env('BANGJHON_PRO_STARTER_BRAND', config('app.name', 'Bangjhon Pro Starter')),
        'tagline' => 'Premium Laravel authentication and dashboard scaffolding.',
    ],

    'admin' => [
        'name' => env('BANGJHON_PRO_STARTER_ADMIN_NAME', 'Administrator'),
        'email' => env('BANGJHON_PRO_STARTER_ADMIN_EMAIL', 'admin@bangjhon.test'),
        'password' => env('BANGJHON_PRO_STARTER_ADMIN_PASSWORD', 'password123'),
    ],
];
