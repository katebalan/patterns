<?php
declare(strict_types = 1);

namespace AbstractFactory\Test;

use AbstractFactory\Maze;
use AbstractFactory\MazeFactory;
use AbstractFactory\MazeGame;
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
    }
}
