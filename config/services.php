<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '385818281924698',
        'client_secret' => '36c9a69b3f34f7fd911cf2efcc6c1ab7',
        'redirect' => 'http://localhost:8888/UYWH.id/public/callback',
    ],

    'linkedin' => [
        'client_id' => '81yq6ilm3y8ris',
        'client_secret' => 'k9pk0mp8ZHnNySJ6',
        'redirect' => 'http://localhost:8888/UYWH.id/public/linkedin-callback',
    ],
];
