<?php

namespace Fake\ChasterObjects\Objects\Interfaces;

use DateTimeInterface;

interface LockInterface extends ProgressInterface, LockSessionInterface
{
    public function getId(): ?string;

    /**
     * @return $this
     */
    public function setMaxLimitDate(?DateTimeInterface $maxLimitDate): static;

    public function hasMaxLimitDate(): bool;

    public function getMaxLimitDate(): ?DateTimeInterface;
}
