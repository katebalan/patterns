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
        return parent::enter();
    }
}
