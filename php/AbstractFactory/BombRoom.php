<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class BombRoom
 * @package AbstractFactory
 */
class BombRoom extends Room
{
    public function enter(): bool
    {
        return $value = rand(0,1) == 1;
    }
}
