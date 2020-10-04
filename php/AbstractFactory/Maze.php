<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class Maze
 * @package php\AbstractFactory
 */
class Maze
{
    private $rooms = [];

    public function setRoom(Room $room): Maze
    {
        $this->rooms[] = $room;

        return $this;
    }

    public function getRooms(): array
    {
        return $this->rooms;
    }
}
