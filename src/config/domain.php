<?php

return [
    'env_stub' => '.env',
    'web_domain_var' => 'HTTP_HOST', // HTTP_HOST SERVER_NAME
    'storage_dirs' => [
        'app' => [
            'public' => [],
        ],
        'framework' => [
            'cache' => [],
            'testing' => [],
            'sessions' => [],
            'views' => [],
        ],
        'logs' => [],
    ],
    'domains' => [],
];
