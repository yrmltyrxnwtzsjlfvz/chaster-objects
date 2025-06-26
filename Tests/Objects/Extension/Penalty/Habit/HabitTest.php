<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Penalty\Habit;

use Fake\ChasterObjects\Objects\Extension\Penalty\Habit\Habit;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class HabitTest extends TestCase
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
        $habit = new Habit();
        self::assertNull($habit->getName());

        self::assertInstanceOf(Habit::class, $habit->setName($name));
        self::assertSame($name, $habit->getName());
    }
}
