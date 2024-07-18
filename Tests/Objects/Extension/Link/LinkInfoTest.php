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
}
