<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Log;

use Interop\Container\ContainerInterface;
use Zend\Log\LoggerAbstractServiceFactory as DefaultLoggerAbstractServiceFactory;

/**
 * Class LoggerAbstractServiceFactory
 * @package MSBios\Log
 */
class LoggerAbstractServiceFactory extends DefaultLoggerAbstractServiceFactory
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
