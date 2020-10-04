<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class Element
 * @package AbstractFactory
 */
abstract class Element
{
    public function enter(): bool
    {
        return TRUE;
    }
}
