<?php
return [
    'settings' => [
        'determineRouteBeforeAppMiddleware' => true,
        'displayErrorDetails' => getenv('SHOW_ERRORS'),
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => ROOT_PATH . '/app/views/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : ROOT_PATH . '/logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Database connection settings
		"db" => [
			"host" => getenv('DB_HOST'),
			"dbname" => getenv('DB_NAME'),
			"user" => getenv('DB_USER'),
			"pass" => getenv('DB_PASS')
		],
    ],
];
