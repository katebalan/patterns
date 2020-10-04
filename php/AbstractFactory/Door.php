<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class Door
 * @package AbstractFactory
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
