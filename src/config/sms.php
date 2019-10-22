<?php


return [

    /*
    |--------------------------------------------------------------------------
    | Sms Driver
    |--------------------------------------------------------------------------
    |
    | Supported: "messagebird", "twilio", "nexmo"
    |
    */

    'driver' => env('SMS_DRIVER', 'twilio'),

    'messagebird' => [
        'driver' => 'messagebird',
        'api_key' => env('MESSAGEBIRD_API_KEY'),
        'originator' => env('MESSAGEBIRD_ORIGINATOR')
    ],

    'twilio' => [
        'driver' => 'twilio',
        'twilio_sid' => env('TWILIO_SID'),
        'twilio_token' => env('TWILIO_TOKEN'),
        'twilio_from' => env('TWILIO_FROM')
    ],

    'nexmo' => [
        'driver' => 'nexmo',
        'nexmo_api_key' => env('NEXMO_API_KEY'),
        'nexmo_secret' => env('NEXMO_SECRET'),
        'nexmo_from' => env('NEXMO_FROM')
    ]
];
