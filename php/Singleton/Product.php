<?php
declare(strict_types = 1);

namespace Singleton;

/**
 * Class Product
 * @package Singleton
 */
final class Product
{
    /** @var Product */
    private static $instance;

    public $a;

    /**
     * @return Product
     */
    public static function getInstance(): Product
    {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __sleep() {}
    private function __wakeup() {}
}
