<?php

namespace Fake\ChasterObjects\Tests\Objects;

use Bytes\Tests\Common\DataProvider\BooleanProviderTrait;
use Fake\ChasterObjects\Enums\ExtensionMode;
use Fake\ChasterObjects\Objects\ExtensionPublic;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;

class ExtensionPublicTest extends TestCase
{
    use BooleanProviderTrait;

    public function testGetSetDefaultRegularity()
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getDefaultRegularity());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setDefaultRegularity(123));
        self::assertSame(123, $extension->getDefaultRegularity());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetFeatured($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isFeatured());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setFeatured($bool));
        self::assertSame($bool, $extension->isFeatured());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetTesting($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isTesting());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setTesting($bool));
        self::assertSame($bool, $extension->isTesting());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetPremium($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isPremium());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setPremium($bool));
        self::assertSame($bool, $extension->isPremium());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetDevelopedByCommunity($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isDevelopedByCommunity());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setDevelopedByCommunity($bool));
        self::assertSame($bool, $extension->isDevelopedByCommunity());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetPartner($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isPartner());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setPartner($bool));
        self::assertSame($bool, $extension->isPartner());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetEnabled($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isEnabled());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setEnabled($bool));
        self::assertSame($bool, $extension->isEnabled());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testIsSetCountedInExtensionsLimit($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->isCountedInExtensionsLimit());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setCountedInExtensionsLimit($bool));
        self::assertSame($bool, $extension->isCountedInExtensionsLimit());
    }

    /**
     * @dataProvider provideBooleans
     *
     * @param bool $bool
     *
     * @return void
     */
    public function testHasSetActions($bool)
    {
        $extension = new ExtensionPublic();

        self::assertFalse($extension->hasActions());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setActions($bool));
        self::assertSame($bool, $extension->hasActions());
    }

    public static function provideText(): Generator
    {
        yield [Factory::create()->md5()];
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetConfigIframeUrl($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getConfigIframeUrl());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setConfigIframeUrl($text));
        self::assertSame($text, $extension->getConfigIframeUrl());
    }

    /**
     * @dataProvider provideAvailableModes
     *
     * @return void
     */
    public function testGetSetAvailableModes($modes, $expectedCount)
    {
        $extension = new ExtensionPublic();

        self::assertEmpty($extension->getAvailableModes());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setAvailableModes($modes));
        self::assertCount($expectedCount, $extension->getAvailableModes());
    }

    public static function provideAvailableModes(): Generator
    {
        yield ['modes' => [], 'expectedCount' => 0];
        foreach (range(1, count(ExtensionMode::cases())) as $i) {
            yield ['modes' => Factory::create()->randomElements(ExtensionMode::values(), $i), 'expectedCount' => $i];
        }
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetPartnerExtensionId($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getPartnerExtensionId());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setPartnerExtensionId($text));
        self::assertSame($text, $extension->getPartnerExtensionId());
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetSummary($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getSummary());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setSummary($text));
        self::assertSame($text, $extension->getSummary());
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetIcon($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getIcon());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setIcon($text));
        self::assertSame($text, $extension->getIcon());
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetSubtitle($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getSubtitle());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setSubtitle($text));
        self::assertSame($text, $extension->getSubtitle());
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetDisplayName($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getDisplayName());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setDisplayName($text));
        self::assertSame($text, $extension->getDisplayName());
    }

    /**
     * @dataProvider provideText
     *
     * @return void
     */
    public function testGetSetSlug($text)
    {
        $extension = new ExtensionPublic();

        self::assertNull($extension->getSlug());
        self::assertInstanceOf(ExtensionPublic::class, $extension->setSlug($text));
        self::assertSame($text, $extension->getSlug());
    }
}
