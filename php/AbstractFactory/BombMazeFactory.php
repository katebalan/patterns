<?php
declare(strict_types = 1);

namespace AbstractFactory;

/**
 * Class BombMazeFactory
 * @package AbstractFactory
 */
class BombMazeFactory extends MazeFactory
{
    public function makeMaze()
    {
        return new Maze();
    }
    public function makeRoom(int $id): Room
    {
        return new BombRoom($id);
    }

    public function makeDoor(Room $one, Room $two): Door
    {
        return new BombDoor(true, $one, $two);
    }

    public function makeWall(): Wall
    {
        return new Wall();
    }
}
