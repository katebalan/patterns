<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class Room
 * @package php\AbstractFactory
 */
class Room extends Element
{
    public $id;

    private $sides;

    public function __construct($id)
    {
        $this->id = $id;
        $this->sides = [];
    }

    public function setSides(array $sides)
    {
        $this->sides = $sides;

        return $this;
    }

    public function getSides(): array
    {
        return $this->sides;
    }
}
