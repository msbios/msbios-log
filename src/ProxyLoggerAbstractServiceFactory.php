<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Log;

use Interop\Container\ContainerInterface;
use Zend\Log\LoggerAbstractServiceFactory;

/**
 * Class ProxyLoggerAbstractServiceFactory
 * @package MSBios\Log
 */
class ProxyLoggerAbstractServiceFactory extends LoggerAbstractServiceFactory
{
    /** @var string */
    protected $configKey = 'logs';

    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param $requestedName
     * @param array|null $options
     * @return ProxyLogger|object|\Zend\Log\Logger
     * @throws \Interop\Container\Exception\ContainerException
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return new ProxyLogger(
            parent::__invoke($container, $requestedName, $options),
            isset($this->config['enabled']) && $this->config['enabled']
        );
    }
}
