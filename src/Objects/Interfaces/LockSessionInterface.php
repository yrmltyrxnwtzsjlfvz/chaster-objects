<?php

namespace Fake\ChasterObjects\Objects\Interfaces;

interface LockSessionInterface
{
    public static function normalizeToLockId(LockSessionInterface|string $lock): string;
}
