<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Penalty\Habit;

use Fake\ChasterObjects\Objects\Extension\Penalty\Habit\Habit;
use Generator;
use Zenstruck\Foundry\Test\Factories;

class HabitTest extends TimeLimitTest
{
    use Factories;

    public static function provideGetSetCount(): Generator
    {
        yield 'null' => ['count' => null];
        foreach (range(1, 10) as $i) {
            yield $i => ['count' => $i];
        }
    }

    /**
     * @dataProvider provideGetSetCount
     *
     * @return void
     */
    public function testGetSetCount($count)
    {
        $habit = new Habit();
        self::assertEquals(1, $habit->getCount());

        self::assertInstanceOf(Habit::class, $habit->setCount($count));
        self::assertSame($count, $habit->getCount());
    }
}
