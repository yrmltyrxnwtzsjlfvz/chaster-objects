<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\TemporaryOpening;

use DateTime;
use Fake\ChasterFactory\Factory\TemporaryOpeningConfigFactory;
use Fake\ChasterObjects\Objects\Extension\TemporaryOpening\Config;
use Fake\ChasterObjects\Objects\Extension\TemporaryOpening\ExtensionTemporaryOpening;
use Fake\ChasterObjects\Objects\Extension\TemporaryOpening\UserData;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class ExtensionTest extends TestCase
{
    use Factories;

    public function testGetSetConfig()
    {
        $config = TemporaryOpeningConfigFactory::createOne();
        $extension = new ExtensionTemporaryOpening();

        self::assertInstanceOf(ExtensionTemporaryOpening::class, $extension->setConfig($config));
        self::assertInstanceOf(Config::class, $extension->getConfig());
    }

    public function testGetSetUserData()
    {
        $extension = new ExtensionTemporaryOpening();
        $data = new UserData();

        self::assertInstanceOf(ExtensionTemporaryOpening::class, $extension->setUserData($data));
        self::assertInstanceOf(UserData::class, $extension->getUserData());
    }

    /**
     * @dataProvider provideCanWearerUnlock
     *
     * @return void
     */
    public function testCanWearerUnlock($expected, $extension)
    {
        self::assertSame($expected, $extension->canWearerUnlock());
    }

    public static function provideCanWearerUnlock(): Generator
    {
        $extension = new ExtensionTemporaryOpening();
        $extension->setNbActionsRemaining(0);

        $data = new UserData();
        $config = new Config();
        $config->setKeyholderOpenOnly(false);

        yield ['expected' => false, 'extension' => clone $extension->setConfig(clone $config)->setUserData(clone $data)];

        $extension->setNbActionsRemaining(1);
        yield ['expected' => true, 'extension' => clone $extension->setConfig(clone $config)->setUserData(clone $data)];

        $config->setKeyholderOpenOnly(true);
        yield ['expected' => false, 'extension' => clone $extension->setConfig(clone $config)->setUserData(clone $data)];

        $config->setKeyholderOpenOnly(false);
        $data->setOpenedAt(new DateTime());
        yield ['expected' => false, 'extension' => clone $extension->setConfig(clone $config)->setUserData(clone $data)];
    }

    public function testGetOpenedAtIsOpen()
    {
        $extension = new ExtensionTemporaryOpening();
        $data = new UserData();
        self::assertInstanceOf(ExtensionTemporaryOpening::class, $extension->setUserData($data));
        self::assertFalse($extension->isOpen());
        $openedAt = Factory::create()->dateTime();
        $data->setOpenedAt($openedAt);

        self::assertInstanceOf(ExtensionTemporaryOpening::class, $extension->setUserData($data));
        self::assertTrue($extension->isOpen());
        self::assertEquals($openedAt, $extension->getOpenedAt());
    }
}
