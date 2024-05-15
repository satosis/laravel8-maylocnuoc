<?php
return [
    'app_url' => env('APP_URL'),
    'momo' => [
        'partner_code'   => env('MOMO_PARTNER_CODE',null),
        'access_key'     => env('MOMO_ACCESS_KEY', null),
        'secret_key'     => env('MOMO_SECRET_KEY', null),
        'callback_url' => env('MOMO_CALLBACK_URL', null),
    ]
];
