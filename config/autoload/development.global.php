<?php

/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Log;

use Zend\Log\Logger;

return [
    \MSBios\Assetic\Module::class => [
        'paths' => [
            __DIR__ . '/../../themes/limitless/public',
        ],
        'maps' => [
            // css
            'css/bootstrap.min.css' =>
                __DIR__ . '/../../vendor/msbios/application/themes/default/public/css/bootstrap.min.css',
            'css/bootstrap-theme.min.css' =>
                __DIR__ . '/../../vendor/msbios/application/themes/default/public/css/bootstrap-theme.min.css',
            'css/style.css' =>
                __DIR__ . '/../../vendor/msbios/application/themes/default/public/css/style.css',

            // js
            'js/jquery-3.1.0.min.js' =>
                __DIR__ . '/../../vendor/msbios/application/themes/default/public/js/jquery-3.1.0.min.js',
            'js/bootstrap.min.js' =>
                __DIR__ . '/../../vendor/msbios/application/themes/default/public/js/bootstrap.min.js',

            // imgs
            'img/zf-logo-mark.svg' =>
                __DIR__ . '/../../vendor/msbios/application/themes/default/public/img/zf-logo-mark.svg',
        ],
    ],

    'log' => [
        'writers' => [
            'stream' => [
                'options' => [
                    'stream' => "./data/logs/info.log",
                    'filters' => [
                        'priority' => [
                            'options' => [
                                'priority' => Logger::INFO,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
