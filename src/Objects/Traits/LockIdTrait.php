<?php

namespace Fake\ChasterObjects\Objects\Traits;

use Symfony\Component\Validator\Constraints as Assert;

trait LockIdTrait
{
    #[Assert\NotBlank]
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
