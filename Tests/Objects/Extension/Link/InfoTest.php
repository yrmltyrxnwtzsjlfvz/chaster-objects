<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Link;

use Fake\ChasterObjects\Objects\Extension\Link\Info;
use Fake\ChasterObjects\Tests\Factory\SharedLinkInfoFactory;
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
