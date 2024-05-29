<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use DateInterval;
use Fake\ChasterObjects\Objects\Lock;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Clock\Clock;
use Symfony\Component\Clock\MockClock;

/**
 * @see Lock
 */
class LockTest extends TestCase
{
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
}
