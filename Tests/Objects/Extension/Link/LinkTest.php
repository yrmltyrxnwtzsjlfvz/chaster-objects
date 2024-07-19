<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Fake\ChasterFactory\Factory\SharedLinkLinkFactory;
use Fake\ChasterObjects\Objects\Extension\Link\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{
    use TestLinkTrait;

    public static function createOne()
    {
        return SharedLinkLinkFactory::createOne();
    }

    /**
     * @return class-string
     */
    public static function getTestClass(): string
    {
        return Link::class;
    }
}
