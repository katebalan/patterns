<?php

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

$firstProduct = Product::getInstance();
$secondProduct = Product::getInstance();

$firstProduct->a = 1;
$secondProduct->a = 4;

print_r($firstProduct->a);
// 2
print_r($secondProduct->a);
// 2
?>
