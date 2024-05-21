<?php

namespace Fake\ChasterObjects\Objects\Traits;

trait LockIdTrait
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
}
