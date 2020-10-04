<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class Door
 * @package php\AbstractFactory
 */
class Door extends Element
{
    private $isOpen;

    private $rooms = [];

    public function __construct($isOpen, Room $first, Room $second)
    {
        $this->isOpen = $isOpen;
        $this->rooms[] = $first;
        $this->rooms[] = $second;
    }

    public function enter(): bool
    {
        return $this->isOpen;
    }
}
