<?php
declare(strict_types = 1);

namespace php\AbstractFactory\Test;

use php\AbstractFactory\Maze;
use php\AbstractFactory\MazeFactory;
use php\AbstractFactory\MazeGame;
use PHPUnit\Framework\TestCase;

/**
 * Class MazeTest
 * @package php\AbstractFactory\Test
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
