<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

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
}
