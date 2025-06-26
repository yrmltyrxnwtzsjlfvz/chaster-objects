<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Penalty\Habit;

use Fake\ChasterObjects\Objects\Extension\Penalty\Habit\TimeLimit;
use Generator;
use Zenstruck\Foundry\Test\Factories;

class TimeLimitTest extends HabitTest
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
        $timeLimit = new TimeLimit();
        self::assertEquals(1, $timeLimit->getCount());

        self::assertInstanceOf(TimeLimit::class, $timeLimit->setCount($count));
        self::assertSame($count, $timeLimit->getCount());
    }
}
