<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Fake\ChasterObjects\Objects\Extension\Link\Link;
use Fake\ChasterObjects\Tests\Factory\SharedLinkLinkFactory;
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
