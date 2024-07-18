<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Zenstruck\Foundry\Test\Factories;

trait TestLinkTrait
{
    use Factories;

    public function testSetFromLink()
    {
        $expected = self::createOne();

        $class = self::getTestClass();

        $link = new $class();
        $link->setFromLink($expected);

        self::assertSame($expected->getLink(), $link->getLink());

        $link = new $class();
        $link->setFromLink($expected->getLink());

        self::assertSame($expected->getLink(), $link->getLink());
    }

    public function testCreateFromLink()
    {
        $expected = self::createOne();

        $class = self::getTestClass();

        $link = $class::createFromLink($expected);

        self::assertSame($expected->getLink(), $link->getLink());

        $link = $class::createFromLink($expected->getLink());

        self::assertSame($expected->getLink(), $link->getLink());
    }
}
