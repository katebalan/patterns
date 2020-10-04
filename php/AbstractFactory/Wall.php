<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class Wall
 * @package php\AbstractFactory
 */
class Wall extends Element
{
    public function enter(): bool
    {
        return false;
    }
}
