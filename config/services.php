<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'twitter' => [
        'consumer_key'    => env('XAc4OH2g5np9VjP5iQ96KRwjW'),
        'consumer_secret' => env('Wn9S9GPFhy6ug4t993Xf2gmbQwspnZlbic1cEwUAu2xPx85gvG'),
        'access_token'    => env('1224926458813923328-1224926458813923328-0TbCWbTvjDuj7G4lgxTKvHMNnHucMU'),
        'access_secret'   => env('ocuyzwHbCIcTniXedaF9PirstPnNvCtMTVmlWRiiqjn8i')
    ]


];
