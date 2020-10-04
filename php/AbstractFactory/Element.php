<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class Element
 * @package php\AbstractFactory
 */
abstract class Element
{
    public function enter(): bool
    {
        return TRUE;
    }
}
