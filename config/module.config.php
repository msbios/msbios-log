<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Log;

use Zend\Log\Formatter\Simple;
use Zend\Log\LoggerAbstractServiceFactory;

return [
    'service_manager' => [
        'abstract_factories' => [
            LoggerAbstractServiceFactory::class
        ],
    ],

    'log' => [
        Logger::class => [
            'writers' => [
                [
                    'name' => 'stream',
                    'priority' => Logger::INFO,
                    'options' => [
                        'stream' => './data/logs/logger.log',
                        'formatter' => [
                            'name' => Simple::class,
                            'options' => [
                                'format' => '%timestamp% %priorityName% (%priority%): %message% %extra%',
                                'dateTimeFormat' => 'c',
                            ],
                        ],
                        'filters' => [
                            'priority' => [
                                'name' => 'priority',
                                'options' => [
                                    'operator' => '<=',
                                    'priority' => Logger::INFO,
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
];
