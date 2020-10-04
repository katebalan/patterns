<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class MazeFactory
 * @package AbstractFactory
 */
class MazeFactory
{
    public function makeMaze()
    {
        return new Maze();
    }
    public function makeRoom(int $id): Room
    {
        return new Room($id);
    }

    public function makeDoor(Room $one, Room $two): Door
    {
        return new Door(true, $one, $two);
    }

    public function makeWall(): Wall
    {
        return new Wall();
    }
}
