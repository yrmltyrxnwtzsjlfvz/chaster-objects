<?php

namespace Fake\ChasterObjects\Tests\Objects;

use Fake\ChasterFactory\Factory\ExtensionPartyFactory;
use Fake\ChasterFactory\Factory\LockFactory;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class ExtensionPartyTest extends TestCase
{
    use Factories;

    public function testGetSetNbActionsRemaining()
    {
        self::markTestIncomplete();
    }

    public function testGetExtensionUrl()
    {
        $extension = ExtensionPartyFactory::createOne();
        $lock = LockFactory::createOne(['extensions' => [$extension]]);

        $lockId = $lock->getId();
        $extensionId = $extension->getExtensionPartyId();

        self::assertSame(sprintf('https://chaster.app/locks/%s/extensions/%s', $lockId, $extensionId), $extension->getExtensionUrl(lock: $lock));
        self::assertSame(sprintf('https://chaster.app/locks/%s/extensions/%s', $lockId, $extensionId), $extension->getExtensionUrl(lock: $lockId));
    }

    public function testGetSetIcon()
    {
        self::markTestIncomplete();
    }

    public function testGetSetSummary()
    {
        self::markTestIncomplete();
    }

    public function testGetSetDisplayName()
    {
        self::markTestIncomplete();
    }

    public function testGetSetUserData()
    {
        self::markTestIncomplete();
    }

    public function testGetSetCreatedAt()
    {
        self::markTestIncomplete();
    }

    public function testGetSetConfig()
    {
        self::markTestIncomplete();
    }

    public function testGetSetExtensionPartyId()
    {
        self::markTestIncomplete();
    }

    public function testGetSetUpdatedAt()
    {
        self::markTestIncomplete();
    }

    public function testGetSetNextActionDate()
    {
        self::markTestIncomplete();
    }

    public function testGetSetSubtitle()
    {
        self::markTestIncomplete();
    }
}
