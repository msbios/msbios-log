<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBiosTest\Log;

use MSBios\Log\Module;
use MSBios\ModuleInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class LoggerTest
 * @package MSBiosTest\Log
 */
class LoggerTest extends TestCase
{

    /**
     * @return Module|ModuleInterface
     */
    public function testInstance()
    {
        /** @var ModuleInterface $instance */
        $instance = new Module;
        $this->assertInstanceOf(ModuleInterface::class, $instance);
        return $instance;
    }

    /**
     * @depends testInstance
     * @param ModuleInterface $instance
     */
    public function testGetConfig(ModuleInterface $instance)
    {
        $this->assertInternalType('array', $instance->getConfig());
    }

    /**
     * @depends testInstance
     * @param ModuleInterface $instance
     */
    public function testGetAutoloaderConfig(ModuleInterface $instance)
    {
        $this->assertInternalType('array', $instance->getAutoloaderConfig());
    }
}
