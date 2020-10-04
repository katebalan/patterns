<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class BombRoom
 * @package php\AbstractFactory
 */
class BombRoom extends Room
{
    public function enter(): bool
    {
        return parent::enter();
    }
}
