<?php

return [

    'credentials' => [
        'api_key' => env('KATANA_API_KEY', '')
    ],

    'version' => 'v1',

    'rate_limiting' => [
        'store' => \Reno\Katana\Store\RateLimiterCacheStore::class
    ],

    'retry' => [
        'enabled' => true,
        'attempts' => 3,
        // Time between retry attempts, in milliseconds
        'wait' => 3000
    ],

    // Request timeout in seconds
    'timeout' => 30
];
