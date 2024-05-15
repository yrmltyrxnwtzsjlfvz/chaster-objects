<?php

namespace Fake\ChasterObjects\Objects\Interfaces;

interface LockInterface extends ProgressInterface, LockSessionInterface
{
    public function getId(): ?string;

    /**
     * @return $this
     */
    public function setMaxLimitDate(?\DateTimeInterface $maxLimitDate): static;

    public function hasMaxLimitDate(): bool;

    public function getMaxLimitDate(): ?\DateTimeInterface;
}
