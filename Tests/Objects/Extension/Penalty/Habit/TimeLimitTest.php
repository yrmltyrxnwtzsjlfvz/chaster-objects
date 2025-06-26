<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Penalty\Habit;

use Fake\ChasterObjects\Objects\Extension\Penalty\Habit\TimeLimit;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class TimeLimitTest extends TestCase
{
    use Factories;

    public static function provideGetSetName(): Generator
    {
        $faker = Factory::create();
        yield [$faker->unique()->word()];
        yield [$faker->unique()->word()];
        yield [$faker->unique()->word()];
        yield [$faker->unique()->word()];
    }

    /**
     * @dataProvider provideGetSetName
     *
     * @return void
     */
    public function testGetSetName($name)
    {
        $timeLimit = new TimeLimit();
        self::assertNull($timeLimit->getName());

        self::assertInstanceOf(TimeLimit::class, $timeLimit->setName($name));
        self::assertSame($name, $timeLimit->getName());
    }
}
