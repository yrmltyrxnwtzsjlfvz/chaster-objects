<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Fake\ChasterObjects\Objects\Extension\Link\LinkInfo;
use Fake\ChasterObjects\Tests\Factory\SharedLinkLinkInfoFactory;
use PHPUnit\Framework\TestCase;

class LinkInfoTest extends TestCase
{
    use TestInfoTrait;
    use TestLinkTrait;

    public static function createOne()
    {
        return SharedLinkLinkInfoFactory::createOne();
    }

    /**
     * @return class-string
     */
    public static function getTestClass(): string
    {
        return LinkInfo::class;
    }

    public function testSetFromBoth()
    {
        $expected = self::createOne();

        $class = self::getTestClass();

        $info = new $class();
        $info->setFromInfo($expected);

        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());
        self::assertNull($info->getLink());

        $info->setFromLink($expected);
        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());
        self::assertSame($expected->getLink(), $info->getLink());

        $info = new $class();
        $info->setFromInfo($expected->canVote(), $expected->getMinVotes(), $expected->getVotes());

        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());
        self::assertNull($info->getLink());

        $info->setFromLink($expected->getLink());
        self::assertSame($expected->canVote(), $info->canVote());
        self::assertSame($expected->getMinVotes(), $info->getMinVotes());
        self::assertSame($expected->getVotes(), $info->getVotes());
        self::assertSame($expected->getLink(), $info->getLink());
    }
}
