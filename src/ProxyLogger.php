<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Log;

use Zend\Log\Logger;
use Zend\Log\LoggerInterface;

/**
 * Class ProxyLogger
 * @package MSBios\Log
 */
class ProxyLogger implements LoggerInterface
{
    /** @var Logger */
    protected static $logger;

    /** @var bool */
    protected static $enabled = false;

    /**
     * ProxyLogger constructor.
     *
     * @param Logger $logger
     * @param bool $enabled
     */
    public function __construct(Logger $logger, $enabled = false)
    {
        self::$logger = $logger;
        self::$enabled = $enabled;
    }

    /**
     * @return bool
     */
    public static function isEnabled(): bool
    {
        return self::$enabled;
    }

    /**
     * @param bool $enabled
     */
    public static function setEnabled(bool $enabled): void
    {
        self::$enabled = $enabled;
    }

    /**
     * @param $priority
     * @param $message
     * @param array $extra
     * @return $this
     */
    public function log($priority, $message, $extra = [])
    {
        if (self::isEnabled()) {
            self::$logger->log($priority, $message, $extra);
        }

        return $this;
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function emerg($message, $extra = [])
    {
        return $this->log(Logger::EMERG, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return mixed|LoggerInterface
     */
    public function alert($message, $extra = [])
    {
        return $this->alert(Logger::ALERT, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function crit($message, $extra = [])
    {
        return $this->log(Logger::CRIT, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function err($message, $extra = [])
    {
        return $this->log(Logger::ERR, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function warn($message, $extra = [])
    {
        return $this->log(Logger::WARN, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function notice($message, $extra = [])
    {
        return $this->log(Logger::NOTICE, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function info($message, $extra = [])
    {
        return $this->log(Logger::INFO, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param string $message
     * @param array $extra
     * @return ProxyLogger|LoggerInterface
     */
    public function debug($message, $extra = [])
    {
        return $this->log(Logger::DEBUG, $message, $extra);
    }

    /**
     * @inheritdoc
     *
     * @param $name
     * @param $arguments
     */
    public function __call($name, $arguments)
    {
        if (method_exists(self::$logger, $name)) {
            call_user_func_array([self::$logger, $name], $arguments);
        }
    }
}
