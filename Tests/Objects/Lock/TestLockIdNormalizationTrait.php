<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;
use Fake\ChasterObjects\Objects\Lock;
use Fake\ChasterObjects\Objects\Lock\LockId;
use Fake\ChasterObjects\Objects\Lock\SharedLock;
use Generator;

trait TestLockIdNormalizationTrait
{
    public const TEST_LOCKID = 'abc123';

    public function provideLockNormalization(): Generator
    {
        $lock = (new Lock())->setId(self::TEST_LOCKID);
        yield ['lock' => $lock, 'lockId' => self::TEST_LOCKID];

        $lock = (new LockId())->setLockId(self::TEST_LOCKID);
        yield ['lock' => $lock, 'lockId' => self::TEST_LOCKID];

        $lock = (new SharedLock())->setId(self::TEST_LOCKID);
        yield ['lock' => $lock, 'lockId' => self::TEST_LOCKID];
    }

    /**
     * @param LockSessionInterface $lock
     * @param string               $lockId
     *
     * @dataProvider provideLockNormalization
     */
    public function testLockIdNormalization($lock, $lockId): void
    {
        $this->assertEquals($lockId, $lock::normalizeToLockId($lock));
        $this->assertEquals($lockId, $lock::normalizeToLockId($lockId));
    }

    /**
     * @param LockSessionInterface $lock
     * @param string               $lockId
     *
     * @dataProvider provideLockNormalization
     */
    public function testLockIdNormalizationCrossClass($lock, $lockId): void
    {
        foreach ($this->provideLockNormalization() as $l) {
            $q = $l['lock'];
            $this->assertEquals($lockId, $lock::normalizeToLockId($q));
        }
    }
}
