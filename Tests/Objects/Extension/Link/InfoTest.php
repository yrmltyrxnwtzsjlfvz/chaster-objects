<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Fake\ChasterFactory\Factory\SharedLinkInfoFactory;
use Fake\ChasterObjects\Objects\Extension\Link\Info;
use PHPUnit\Framework\TestCase;

class InfoTest extends TestCase
{
    use TestInfoTrait;

    public static function createOne()
    {
        return SharedLinkInfoFactory::createOne();
    }

    /**
     * @return class-string
     */
    public static function getTestClass(): string
    {
        return Info::class;
    }
}
