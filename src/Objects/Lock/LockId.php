<?php

namespace Fake\ChasterObjects\Objects\Lock;

use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;
use Fake\ChasterObjects\Objects\Traits\LockIdTrait;

class LockId implements LockSessionInterface
{
    use LockIdTrait;

    public static function normalizeToLockId(LockSessionInterface|string $lock): string
    {
        return $lock instanceof LockId ? $lock->getLockId() : $lock;
    }
}
