<?php

namespace Fake\ChasterObjects\Objects\Extension\TemporaryOpening;

use DateTimeInterface;

class UserData
{
    private ?DateTimeInterface $openedAt = null;

    public function getOpenedAt(): ?DateTimeInterface
    {
        return $this->openedAt;
    }

    public function isOpen(): bool
    {
        return !empty($this->getOpenedAt());
    }

    /**
     * @return $this
     */
    public function setOpenedAt(?DateTimeInterface $openedAt): static
    {
        $this->openedAt = $openedAt;

        return $this;
    }
}
