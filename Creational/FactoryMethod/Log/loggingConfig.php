<?php

namespace Creational\FactoryMethod\Log;

return [
    'default' => 'stack',

    'channels' => [
        'stack' => [
            'channels' => ['file', 'syslog', 'slack']
        ],
        'file' => [
            'path' => 'Creational/FactoryMethod/logs.log',
        ],
        'syslog' => [],
        'slack' => [
            'webhook_url' => 'http://teste.com',
        ]
    ]
];