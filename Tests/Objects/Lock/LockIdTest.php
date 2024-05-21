<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use Fake\ChasterObjects\Objects\Lock\LockId;
use PHPUnit\Framework\TestCase;

class LockIdTest extends TestCase
{
    public function testLockId()
    {
        $lock = new LockId();
        $this->assertNull($lock->getLockId());
        $lock->setLockId('abc123');
        $this->assertEquals('abc123', $lock->getLockId());
    }
}
