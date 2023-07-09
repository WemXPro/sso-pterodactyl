<?php

return [
    'secret' => env('WEMX_SSO_SECRET'),
    'token' => [
        'length' => 48,
        'lifetime' => 60
    ],
];
