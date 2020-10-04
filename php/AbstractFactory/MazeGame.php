<?php
declare(strict_types = 1);

namespace php\AbstractFactory;

/**
 * Class MazeGame
 * @package php\AbstractFactory
 */
class MazeGame
{
    public static function create(MazeFactory $factory)
    {
        $maze = $factory->makeMaze();
        $room1 = $factory->makeRoom(1);
        $room2 = $factory->makeRoom(2);

        $door = $factory->makeDoor($room1, $room2);

        $maze->setRoom($room1);
        $maze->setRoom($room2);

        $room1->setSides([
            $factory->makeWall(),
            $door,
            $factory->makeWall(),
            $factory->makeWall()
        ]);

        $room2->setSides([
            $factory->makeWall(),
            $factory->makeWall(),
            $door,
            $factory->makeWall()
        ]);

        return $maze;
    }
}
