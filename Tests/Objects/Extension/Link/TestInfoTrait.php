<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Generator;
use Zenstruck\Foundry\Test\Factories;

trait TestInfoTrait
{
    use Factories;

    public function testSetFromInfo()
    {
        $expected = self::createOne();

        $class = self::getTestClass();

        $info = new $class();
        $info->setFromInfo($expected);

        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());

        $info = new $class();
        $info->setFromInfo($expected->canVote(), $expected->getMinVotes(), $expected->getVotes());

        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());
    }

    public function testCreateFromInfo()
    {
        $expected = self::createOne();

        $class = self::getTestClass();

        $info = $class::createFromInfo($expected);

        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());

        $info = $class::createFromInfo($expected->canVote(), $expected->getMinVotes(), $expected->getVotes());

        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());
    }

    /**
     * @dataProvider provideGetProgressPercentage
     *
     * @param float $expected
     */
    public function testGetProgressPercentage($votes, $minVotes, $expected): void
    {
        $info = self::createOne();

        $info->setVotes($votes)
            ->setMinVotes($minVotes);

        self::assertSame($expected, $info->getProgressPercentage());
    }

    public static function provideGetProgressPercentage(): Generator
    {
        yield ['votes' => 208, 'minVotes' => 209, 'expected' => 99.0];
        yield ['votes' => 209, 'minVotes' => 209, 'expected' => 100.0];
        yield ['votes' => 0, 'minVotes' => 209, 'expected' => 0.0];
        yield ['votes' => 1, 'minVotes' => 209, 'expected' => 0.0];
        yield ['votes' => 2, 'minVotes' => 209, 'expected' => 0.0];
        yield ['votes' => 3, 'minVotes' => 209, 'expected' => 1.0];
    }

    /**
     * @dataProvider provideGetVotesRemaining
     */
    public function testGetVotesRemaining($votes, $minVotes, $expected): void
    {
        $info = self::createOne();

        $info->setVotes($votes)
            ->setMinVotes($minVotes);

        self::assertSame($expected, $info->getVotesRemaining());
    }

    public static function provideGetVotesRemaining(): Generator
    {
        yield ['votes' => 0, 'minVotes' => 0, 'expected' => 0];
        yield ['votes' => -1, 'minVotes' => -1, 'expected' => 0];
        yield ['votes' => null, 'minVotes' => null, 'expected' => 0];
        yield ['votes' => 208, 'minVotes' => 209, 'expected' => 1];
        yield ['votes' => 209, 'minVotes' => 209, 'expected' => 0];
        yield ['votes' => 999, 'minVotes' => 209, 'expected' => 0];
        yield ['votes' => 0, 'minVotes' => 209, 'expected' => 209];
        yield ['votes' => 1, 'minVotes' => 209, 'expected' => 208];
        yield ['votes' => 2, 'minVotes' => 209, 'expected' => 207];
        yield ['votes' => 3, 'minVotes' => 209, 'expected' => 206];
    }
}
