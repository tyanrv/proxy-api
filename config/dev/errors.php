<?php

declare(strict_types=1);

return [
    'config' => [
        'errors' => [
            'display_details' => (bool)getenv('APP_DEBUG'),
            'log' => true
        ]
    ]
];
