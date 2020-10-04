<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class Wall
 * @package AbstractFactory
 */
class Wall extends Element
{
    public function enter(): bool
    {
        return false;
    }
}
