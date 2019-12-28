<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

use Zend\Log\Filter\Priority;
use Zend\Log\Formatter\Simple;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream;

return [
    'log' => [
        'stream' => [
            'name' => Stream::class,
            'options' => [
                'stream' => "./data/logs/errors.log",
                'formatter' => [
                    'name' => Simple::class,
                    'options' => [
                        'format' => '%timestamp% %priorityName% (%priority%): %message% %extra%',
                        'dateTimeFormat' => 'c', // 'Y-m-d H:i:s',
                    ],
                ],
                'filters' => [
                    'priority' => [
                        'name' => Priority::class,
                        'options' => [
                            'priority' => Logger::ERR,
                        ],
                    ],
                ],
            ],
        ],
    ],
];
