<?php

return
    [
        'paths' => [
            'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
            'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds'
        ],
        'environments' => [
            'default_migration_table' => 'phinxlog',
            'default_environment' => 'development',
            'development' => [
                'adapter' => 'mysql',
                'host' => '127.0.0.1',  // localhost
                'name' => 'database',
                'user' => 'root',
                'pass' => 'password',
                'port' => '9002',  // port from docker compose
                'charset' => 'utf8',
            ],
        ],
        'version_order' => 'creation'
    ];
