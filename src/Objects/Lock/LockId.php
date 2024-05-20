<?php

namespace Fake\ChasterObjects\Objects\Lock;

use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;

class LockId implements LockSessionInterface
{
    private ?string $lockId = null;

    public function getLockId(): ?string
    {
        return $this->lockId;
    }

    /**
     * @return $this
     */
    public function setLockId(?string $lockId): self
    {
        $this->lockId = $lockId;

        return $this;
    }

    public static function normalizeToLockId(LockSessionInterface|string $lock): string
    {
        return $lock instanceof LockId ? $lock->getLockId() : $lock;
    }
}
