<?php
declare(strict_types = 1);

namespace php\Singleton;

use PHPUnit\Framework\TestCase;

/**
 * Class ParametersTest
 * @package php\Singleton
 */
class SingletonTest extends TestCase
{
    public function testParameters()
    {
        $first = Parameters::getInstance();
        $second = Parameters::getInstance();

        $first->addParameter('test', true);

        $this->assertTrue($second->getParameter('test'));
        $this->assertEquals($first->getParameter('test'), $second->getParameter('test'));
    }

    public function testProduct()
    {
        $firstProduct = Product::getInstance();
        $secondProduct = Product::getInstance();

        $firstProduct->a = 1;
        $secondProduct->a = 4;

        $this->assertEquals($firstProduct->a, $secondProduct->a);
        $this->assertEquals(4, $firstProduct->a);
        $this->assertEquals(4, $secondProduct->a);
    }
}
