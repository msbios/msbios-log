<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Log;

use Interop\Container\ContainerInterface;
use Zend\Log\Logger;
use Zend\Log\LoggerAwareInterface;
use Zend\ServiceManager\Initializer\InitializerInterface;

/**
 * Class LoggerAwareInitializer
 * @package MSBios\Log
 */
class LoggerAwareInitializer implements InitializerInterface
{
    /**
     * @inheritdoc
     *
     * @param ContainerInterface $container
     * @param object $instance
     */
    public function __invoke(ContainerInterface $container, $instance)
    {
        if ($instance instanceof LoggerAwareInterface) {
            $instance->setLogger($container->get(Logger::class));
        }
    }
}