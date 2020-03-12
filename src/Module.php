<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Log;

use Laminas\Stdlib\ArrayUtils;

/**
 * Class Module
 * @package MSBios\Log
 */
class Module extends \MSBios\Module
{
    /** @const VERSION */
    const VERSION = '2.0.0';

    /**
     * @inheritDoc
     *
     * @return string
     */
    protected function getDir(): string
    {
        return __DIR__;
    }

    /**
     * @inheritDoc
     *
     * @return string
     */
    protected function getNamespace(): string
    {
        return __NAMESPACE__;
    }

    /**
     * @inheritdoc
     *
     * @return array|mixed
     */
    public function getConfig()
    {
        return ArrayUtils::merge(
            parent::getConfig(), [
                'service_manager' => (new ConfigProvider)->getDependencyConfig()
            ]
        );
    }
}