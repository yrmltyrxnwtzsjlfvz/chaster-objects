<?php

namespace Fake\ChasterObjects\Objects\Traits;

use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;

trait LockIdNormalizerTrait
{
    public static function normalizeToLockId(LockSessionInterface|string $lock): string
    {
        if (!($lock instanceof LockSessionInterface)) {
            return $lock;
        }

        if (method_exists($lock, 'getLockId')) {
            return $lock->getLockId();
        }

        if (method_exists($lock, 'getId')) {
            return $lock->getId();
        }

        return $lock;
    }
}
