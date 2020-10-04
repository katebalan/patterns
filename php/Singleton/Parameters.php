<?php
declare(strict_types = 1);

namespace php\Singleton;

/**
 * Class Parameters
 * @package php\Singleton
 */
class Parameters
{
    /** @var Parameters */
    private static $instance;

    /** @var array */
    private $parameters;

    /**
     * Returns Parameters instance
     *
     * @return Parameters
     */
    public static function getInstance(): Parameters
    {
        return self::$instance ?? self::$instance = new self();
    }

    /**
     * Parameters constructor.
     */
    private function __construct()
    {
        $this->parameters = [];
    }

    private function __clone() {}
    private function __sleep() {}
    private function __wakeup() {}

    public function addParameter(string $key, bool $value): Parameters
    {
        $this->parameters[$key] = $value;

        return $this;
    }

    public function getParameter($key): bool
    {
        return $this->parameters[$key];
    }
}
