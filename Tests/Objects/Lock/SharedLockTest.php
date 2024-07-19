<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use Fake\ChasterFactory\Factory\SharedLockFactory;
use Fake\ChasterObjects\Enums\SharedLockDurationMode;
use Fake\ChasterObjects\Objects\Lock\SharedLock;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class SharedLockTest extends TestCase
{
    use Factories;

    public static function provideDurationModes(): Generator
    {
        $faker = Factory::create();

        foreach (self::provideDurations($faker) as $duration) {
            yield ['minDuration' => $duration['minDuration'], 'maxDuration' => $duration['maxDuration'], 'maxLimitDuration' => $duration['maxLimitDuration'], 'minDate' => null, 'maxDate' => null, 'maxLimitDate' => null, 'expectedDurationMode' => SharedLockDurationMode::DURATION];
        }

        foreach (self::provideDurations($faker) as $duration) {
            yield ['minDuration' => $duration['minDuration'], 'maxDuration' => $duration['maxDuration'], 'maxLimitDuration' => $duration['maxLimitDuration'],
                'minDate' => $faker->dateTime(), 'maxDate' => $faker->dateTime(), 'maxLimitDate' => null, 'expectedDurationMode' => SharedLockDurationMode::DATE];
            yield ['minDuration' => $duration['minDuration'], 'maxDuration' => $duration['maxDuration'], 'maxLimitDuration' => $duration['maxLimitDuration'],
                'minDate' => $faker->dateTime(), 'maxDate' => $faker->dateTime(), 'maxLimitDate' => $faker->dateTime(), 'expectedDurationMode' => SharedLockDurationMode::DATE];
        }
    }

    public static function provideDurations($faker = null): Generator
    {
        $faker ??= Factory::create();

        yield ['minDuration' => 0, 'maxDuration' => 0, 'maxLimitDuration' => 0];
        yield ['minDuration' => 1, 'maxDuration' => 1, 'maxLimitDuration' => 0];
        yield ['minDuration' => null, 'maxDuration' => null, 'maxLimitDuration' => null];
        yield ['minDuration' => $faker->optional()->numberBetween(), 'maxDuration' => $faker->optional()->numberBetween(), 'maxLimitDuration' => $faker->optional()->numberBetween()];
    }

    public function testGetSetDurationDefaults()
    {
        $lock = new SharedLock();

        self::assertNull($lock->getMinDuration());
        self::assertNull($lock->getMaxDuration());
        self::assertNull($lock->getMaxLimitDuration());

        self::assertNull($lock->getMinDate());
        self::assertNull($lock->getMaxDate());
        self::assertNull($lock->getMaxLimitDate());

        self::assertSame(SharedLockDurationMode::DURATION, $lock->getDurationMode());
    }

    public function testGetSetDuration()
    {
        $faker = Factory::create();

        $lock = SharedLockFactory::createOne(['minDuration' => $faker->numberBetween(60, 90), 'maxDuration' => $faker->numberBetween(60, 90), 'maxLimitDuration' => null, 'durationMode' => SharedLockDurationMode::DURATION]);

        self::assertNotNull($lock->getMinDuration());
        self::assertNotNull($lock->getMaxDuration());
        self::assertNull($lock->getMaxLimitDuration());

        self::assertNull($lock->getMinDate());
        self::assertNull($lock->getMaxDate());
        self::assertNull($lock->getMaxLimitDate());

        self::assertSame(SharedLockDurationMode::DURATION, $lock->getDurationMode());
        self::assertFalse($lock->getLimitLockTime());

        $lock = SharedLockFactory::createOne(['minDuration' => $faker->numberBetween(60, 90), 'maxDuration' => $faker->numberBetween(60, 90), 'maxLimitDuration' => $faker->numberBetween(60, 90), 'durationMode' => SharedLockDurationMode::DURATION]);

        self::assertNotNull($lock->getMinDuration());
        self::assertNotNull($lock->getMaxDuration());
        self::assertNotNull($lock->getMaxLimitDuration());

        self::assertNull($lock->getMinDate());
        self::assertNull($lock->getMaxDate());
        self::assertNull($lock->getMaxLimitDate());

        self::assertSame(SharedLockDurationMode::DURATION, $lock->getDurationMode());
        self::assertTrue($lock->getLimitLockTime());
    }

    public function testGetSetDate()
    {
        $faker = Factory::create();

        $lock = SharedLockFactory::createOne(['minDate' => $faker->dateTime(), 'maxDate' => $faker->dateTime(), 'maxLimitDate' => null, 'durationMode' => SharedLockDurationMode::DATE]);

        self::assertNotNull($lock->getMinDate());
        self::assertNotNull($lock->getMaxDate());
        self::assertNull($lock->getMaxLimitDate());

        self::assertSame(1, $lock->getMinDuration());
        self::assertSame(1, $lock->getMaxDuration());
        self::assertNull($lock->getMaxLimitDuration());

        self::assertSame(SharedLockDurationMode::DATE, $lock->getDurationMode());
        self::assertFalse($lock->getLimitLockTime());

        $lock = SharedLockFactory::createOne(['minDate' => $faker->dateTime(), 'maxDate' => $faker->dateTime(), 'maxLimitDate' => $faker->dateTime(), 'durationMode' => SharedLockDurationMode::DATE]);

        self::assertNotNull($lock->getMinDate());
        self::assertNotNull($lock->getMaxDate());
        self::assertNotNull($lock->getMaxLimitDate());

        self::assertSame(1, $lock->getMinDuration());
        self::assertSame(1, $lock->getMaxDuration());
        self::assertNull($lock->getMaxLimitDuration());

        self::assertSame(SharedLockDurationMode::DATE, $lock->getDurationMode());
        self::assertTrue($lock->getLimitLockTime());
    }

    /**
     * @dataProvider provideDurationModes
     *
     * @return void
     */
    public function testSetupDurationMode($minDuration, $maxDuration, $maxLimitDuration, $minDate, $maxDate, $maxLimitDate, $expectedDurationMode)
    {
        $lock = new SharedLock();
        $lock->setMinDuration($minDuration)
            ->setMaxDuration($maxDuration)
            ->setMaxLimitDuration($maxLimitDuration)
            ->setMinDate($minDate)
            ->setMaxDate($maxDate)
            ->setMaxLimitDate($maxLimitDate)
            ->setupDurationMode();

        self::assertSame($expectedDurationMode, $lock->getDurationMode());
    }

    /**
     * @dataProvider provideCanViewTime
     *
     * @return void
     */
    public function testCanViewTime($displayRemainingTime, $hideTimeLogs, $expected)
    {
        $lock = new SharedLock();
        $lock->setDisplayRemainingTime($displayRemainingTime)
            ->setHideTimeLogs($hideTimeLogs);

        self::assertSame($expected, $lock->canViewTime());
    }

    public static function provideCanViewTime(): Generator
    {
        yield ['displayRemainingTime' => true, 'hideTimeLogs' => true, 'expected' => true];
        yield ['displayRemainingTime' => true, 'hideTimeLogs' => false, 'expected' => true];
        yield ['displayRemainingTime' => false, 'hideTimeLogs' => true, 'expected' => false];
        yield ['displayRemainingTime' => false, 'hideTimeLogs' => false, 'expected' => true];
        yield ['displayRemainingTime' => null, 'hideTimeLogs' => null, 'expected' => false];
    }

    /**
     * @dataProvider providePasswordRequired
     *
     * @return void
     */
    public function testPasswordRequired($password, $expected)
    {
        $lock = new SharedLock();
        $lock->setPasswordRequired($password);

        self::assertSame($expected, $lock->getRequirePassword());
    }

    public static function providePasswordRequired(): Generator
    {
        yield ['password' => null, 'expected' => false];
        yield ['password' => '', 'expected' => false];
        yield ['password' => Factory::create()->password(), 'expected' => true];
    }
}
