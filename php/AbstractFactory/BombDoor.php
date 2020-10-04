<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class BombDoor
 * @package AbstractFactory
 */
class BombDoor extends Door
{
    public function enter(): bool
    {
        return $value = rand(0,1) == 1;
    }
}
