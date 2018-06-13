<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // DB connection settings

        'db' => [
            'host' => 'localhost',
            'port' => '3306',
            'user' => 'test_task_db_admin',
            'pass' => 'aekbzwi83r',
            'db_name' => 'test_task_db',
        ],
    ],
];
