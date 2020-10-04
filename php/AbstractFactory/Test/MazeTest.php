<?php
declare(strict_types = 1);

namespace AbstractFactory\Test;

use AbstractFactory\BombMazeFactory;
use AbstractFactory\BombRoom;
use AbstractFactory\Maze;
use AbstractFactory\MazeFactory;
use AbstractFactory\MazeGame;
use AbstractFactory\Room;
use PHPUnit\Framework\TestCase;

/**
 * Class MazeTest
 * @package AbstractFactory\Test
 */
class MazeTest extends TestCase
{
    public function testMaze()
    {
        $factory = new MazeFactory();
        $maze = MazeGame::create($factory);

        $this->assertInstanceOf(Maze::class, $maze);
        $this->assertIsArray($maze->getRooms());

        $rooms = $maze->getRooms();
        $this->assertInstanceOf(Room::class, array_shift($rooms));
    }

    public function testBombMaze()
    {
        $factory = new BombMazeFactory();
        $maze = MazeGame::create($factory);

        $this->assertInstanceOf(Maze::class, $maze);
        $this->assertIsArray($maze->getRooms());

        $rooms = $maze->getRooms();
        $this->assertInstanceOf(BombRoom::class, array_shift($rooms));
    }
}
