<?php
/**
 * If you need an environment-specific system or application configuration,
 * there is an example in the documentation
 * @see https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-system-configuration
 * @see https://docs.zendframework.com/tutorials/advanced-config/#environment-specific-application-configuration
 */
return [
    // Retrieve list of modules used in this application.
    'modules' => [
        'Zend\Session',
        'Zend\Validator',
        'Zend\Mvc\Plugin\FilePrg',
        'Zend\Form',
        'Zend\Router',
        'Zend\Hydrator',
        'Zend\InputFilter',
        'Zend\Filter',
        'Zend\Mvc\Plugin\FlashMessenger',
        'Zend\Mvc\Plugin\Identity',
        'Zend\Mvc\Plugin\Prg',
        'Zend\Cache',
        'Zend\Serializer',
        'Zend\I18n',
        'Zend\Navigation',

        'MSBios',
        'MSBios\Application',
        'MSBios\Session',
        'MSBios\Theme',
        'MSBios\Widget',
        'MSBios\View',
        'MSBios\Assetic',
        'MSBios\Cache',
        'MSBios\I18n',
        'MSBios\Navigation',
        'MSBios\Log',

        'Zend\Log',
        // 'Jhu\ZdtLoggerModule',
        'ZendDeveloperTools',
    ],

    'module_listener_options' => [
        'module_paths' => [
            './module',
            './vendor',
        ],
        'config_glob_paths' => [
            realpath(__DIR__) . '/autoload/{{,*.}global,{,*.}local}.php',
        ],
        'config_cache_enabled' => false,
        // 'config_cache_key' => 'application.config.cache',
        'module_map_cache_enabled' => false,
        // 'module_map_cache_key' => 'application.module.cache',
        'cache_dir' => 'data/cache/',
    ],
];
