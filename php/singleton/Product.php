<?php

namespace php\singleton;

final class Product
{
    private static $instance;

    public $a;

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __construct()
    {
    }

    public function __clone()
    {
    }

    public function __sleep()
    {
    }

    public function __wakeup()
    {
    }
}
