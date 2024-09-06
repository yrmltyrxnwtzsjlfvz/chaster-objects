<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use DateInterval;
use Fake\ChasterFactory\Factory\ExtensionHomeActionWithPartyIdFactory;
use Fake\ChasterFactory\Factory\ExtensionPartyFactory;
use Fake\ChasterObjects\Enums\HomeAction;
use Fake\ChasterObjects\Objects\Lock;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Clock\Clock;
use Symfony\Component\Clock\MockClock;
use Zenstruck\Foundry\Test\Factories;

/**
 * @see Lock
 */
class LockTest extends TestCase
{
    use Factories;

    public static function provideGetStartToLesserOfMaxOrEndInterval(): Generator
    {
        $clock = static::getClock();
        $now = $clock->now();
        $start = $now;

        yield ['start' => $start, 'end' => $now->add(new DateInterval('PT30M')), 'max' => $now->add(new DateInterval('PT15M')), 'expected' => new DateInterval('PT15M')];
        yield ['start' => $start, 'end' => $now->add(new DateInterval('PT15M')), 'max' => $now->add(new DateInterval('PT30M')), 'expected' => new DateInterval('PT15M')];
        yield ['start' => $start, 'end' => $now->add(new DateInterval('PT30M')), 'max' => null, 'expected' => new DateInterval('PT30M')];
        yield ['start' => $start, 'end' => $now->add(new DateInterval('PT15M')), 'max' => null, 'expected' => new DateInterval('PT15M')];
        $start = $now->sub(new DateInterval('PT1H'));
        yield ['start' => $start, 'end' => $now->sub(new DateInterval('PT30M')), 'max' => $now->sub(new DateInterval('PT15M')), 'expected' => new DateInterval('PT30M')];
        yield ['start' => $start, 'end' => $now->sub(new DateInterval('PT15M')), 'max' => $now->sub(new DateInterval('PT30M')), 'expected' => new DateInterval('PT30M')];
        yield ['start' => $start, 'end' => $now->sub(new DateInterval('PT30M')), 'max' => null, 'expected' => new DateInterval('PT30M')];
        yield ['start' => $start, 'end' => $now->sub(new DateInterval('PT15M')), 'max' => null, 'expected' => new DateInterval('PT45M')];
    }

    private static function getClock()
    {
        // by default, Clock uses the NativeClock implementation, but you can change
        // this by setting any other implementation
        Clock::set(new MockClock());

        // Then, you can get the clock instance
        $clock = Clock::get();
        $clock->withTimeZone('UTC');

        return $clock;
    }

    public static function provideGetNowToLesserOfMaxOrEndInterval(): Generator
    {
        $clock = static::getClock();
        $now = $clock->now();
        $start = $now->sub(new DateInterval('PT1H'));

        yield ['now' => $now, 'start' => $start, 'end' => $now->add(new DateInterval('PT45M')), 'max' => $now->add(new DateInterval('PT55M')), 'expected' => new DateInterval('PT45M')];
        yield ['now' => $now, 'start' => $start, 'end' => $now->add(new DateInterval('PT55M')), 'max' => $now->add(new DateInterval('PT45M')), 'expected' => new DateInterval('PT45M')];
        yield ['now' => $now, 'start' => $start, 'end' => $now->add(new DateInterval('PT15M')), 'max' => $now->add(new DateInterval('PT30M')), 'expected' => new DateInterval('PT15M')];
        yield ['now' => $now, 'start' => $start, 'end' => $now->add(new DateInterval('PT30M')), 'max' => $now->add(new DateInterval('PT15M')), 'expected' => new DateInterval('PT15M')];
        yield ['now' => $now, 'start' => $start, 'end' => $now->add(new DateInterval('PT45M')), 'max' => null, 'expected' => new DateInterval('PT45M')];
        yield ['now' => $now, 'start' => $start, 'end' => $now->add(new DateInterval('PT15M')), 'max' => null, 'expected' => new DateInterval('PT15M')];
    }

    /**
     * @dataProvider provideGetStartToLesserOfMaxOrEndInterval
     *
     * @return void
     */
    public function testGetStartToLesserOfMaxOrEndInterval($start, $end, $max, $expected)
    {
        $lock = new Lock();
        $lock->setStartDate($start)
            ->setEndDate($end)
            ->setMaxLimitDate($max)
            ->setLimitLockTime(!empty($max));
        $this->assertEquals($expected, $lock->getStartToLesserOfMaxOrEndInterval());
    }

    /**
     * @dataProvider provideGetNowToLesserOfMaxOrEndInterval
     *
     * @return void
     */
    public function testGetNowToLesserOfMaxOrEndInterval($now, $start, $end, $max, $expected)
    {
        $lock = new Lock();
        $lock->setStartDate($start)
            ->setEndDate($end)
            ->setMaxLimitDate($max)
            ->setLimitLockTime(!empty($max));
        $result = $lock->getNowToLesserOfMaxOrEndInterval(now: $now);
        $this->assertEquals($expected, $result);
    }

    public function testGetNowToLesserOfMaxOrEndPercentageInterval()
    {
        $clock = static::getClock();
        $now = $clock->now();
        $start = $now->sub(new DateInterval('PT1H'));
        $end = $now->add(new DateInterval('PT45M'));
        $max = $now->add(new DateInterval('PT55M'));

        $lock = new Lock();
        $lock->setStartDate($start)
            ->setEndDate($end)
            ->setMaxLimitDate($max)
            ->setLimitLockTime(!empty($max));
        $result = $lock->getNowToLesserOfMaxOrEndPercentageInterval(percentage: 0.05, now: $now);
        $this->assertEquals(new DateInterval('PT2M15S'), $result);
    }

    /**
     * @dataProvider provideUnlockable
     *
     * @param bool $lockUnlockable
     * @param bool $extensionsAllowUnlocking
     * @param bool $maxLimitDate
     * @param bool $expected
     *
     * @return void
     */
    public function testUnlockable($lockUnlockable, $extensionsAllowUnlocking, $maxLimitDate, $expected)
    {
        $lock = new Lock();
        $lock->setLockUnlockable($lockUnlockable)
            ->setExtensionsAllowUnlocking($extensionsAllowUnlocking)
            ->setCanBeUnlockedByMaxLimitDate($maxLimitDate);

        self::assertSame($expected, $lock->isUnlockable());
    }

    public static function provideUnlockable(): Generator
    {
        yield ['lockUnlockable' => false, 'extensionsAllowUnlocking' => false, 'maxLimitDate' => false, 'expected' => false];
        yield ['lockUnlockable' => true, 'extensionsAllowUnlocking' => false, 'maxLimitDate' => false, 'expected' => false];
        yield ['lockUnlockable' => false, 'extensionsAllowUnlocking' => true, 'maxLimitDate' => false, 'expected' => false];
        yield ['lockUnlockable' => true, 'extensionsAllowUnlocking' => true, 'maxLimitDate' => false, 'expected' => true];
        yield ['lockUnlockable' => false, 'extensionsAllowUnlocking' => false, 'maxLimitDate' => true, 'expected' => true];
        yield ['lockUnlockable' => true, 'extensionsAllowUnlocking' => false, 'maxLimitDate' => true, 'expected' => true];
        yield ['lockUnlockable' => false, 'extensionsAllowUnlocking' => true, 'maxLimitDate' => true, 'expected' => true];
        yield ['lockUnlockable' => true, 'extensionsAllowUnlocking' => true, 'maxLimitDate' => true, 'expected' => true];
    }

    public function testGetProgressInterval()
    {
        $clock = static::getClock();
        $now = $clock->now();
        $start = $now->sub(new DateInterval('PT1H'));
        $lock = new Lock();
        $lock->setStartDate($start);
        $this->assertEquals(new DateInterval('PT1H'), $lock->getProgressInterval(now: $now));
        $this->assertEquals(new DateInterval('PT1H'), $lock->getStartToNowInterval(now: $now));
        // $this->assertEquals(3600, $lock->getStartToNowSeconds(now: $now));
        $this->assertEquals(60, $lock->getStartToNowMinutes(now: $now));
        $this->assertEquals(1, $lock->getStartToNowHours(now: $now));
        $this->assertEquals(1, $lock->getStartToNowDays(now: $now));
    }

    public function testGetProgressIntervalNoStartDate()
    {
        $lock = new Lock();
        $this->assertNull($lock->getProgressInterval());
        $this->assertNull($lock->getStartToNowInterval());
        $this->assertNull($lock->getStartToNowSeconds());
        $this->assertNull($lock->getStartToNowMinutes());
        $this->assertNull($lock->getStartToNowHours());
        $this->assertNull($lock->getStartToNowDays());
    }

    public function testHasAvailableHomeAction()
    {
        $lock = new Lock();

        $lock->setAvailableHomeActions([]);

        self::assertFalse($lock->hasAvailableHomeAction(HomeAction::START));
        self::assertFalse($lock->hasAvailableHomeAction('start'));

        self::assertFalse($lock->hasAvailableHomeAction('end end end'));

        $lock->setAvailableHomeActions([
            ExtensionHomeActionWithPartyIdFactory::createOne(),
            ExtensionHomeActionWithPartyIdFactory::createOne(['slug' => HomeAction::START]),
            ExtensionHomeActionWithPartyIdFactory::createOne(),
        ]);

        self::assertTrue($lock->hasAvailableHomeAction(HomeAction::START));
        self::assertTrue($lock->hasAvailableHomeAction('start'));

        self::assertFalse($lock->hasAvailableHomeAction('end end end'));
    }

    public function testIsTaskAssigned()
    {
        $lock = new Lock();

        self::assertFalse($lock->isTaskAssigned());

        $lock->setExtensions(ExtensionPartyFactory::createMany(1));

        self::assertFalse($lock->isTaskAssigned());

        $lock->setExtensions(ExtensionPartyFactory::createMany(1, attributes: ['slug' => 'tasks']));

        $lock->setAvailableHomeActions([
            ExtensionHomeActionWithPartyIdFactory::createOne(),
            ExtensionHomeActionWithPartyIdFactory::createOne(['slug' => HomeAction::START]),
            ExtensionHomeActionWithPartyIdFactory::createOne(),
        ]);

        self::assertFalse($lock->isTaskAssigned());

        $lock->setAvailableHomeActions([
            ExtensionHomeActionWithPartyIdFactory::createOne(),
            ExtensionHomeActionWithPartyIdFactory::createOne(['slug' => HomeAction::TASKS_DO_TASK]),
            ExtensionHomeActionWithPartyIdFactory::createOne(),
        ]);

        self::assertTrue($lock->isTaskAssigned());
    }
}
