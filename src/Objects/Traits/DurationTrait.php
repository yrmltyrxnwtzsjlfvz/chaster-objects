<?php

namespace Fake\ChasterObjects\Objects\Traits;

trait DurationTrait
{
    private ?int $duration = null;

    public function getDuration(): ?int
    {
        return $this->duration;
    }

    /**
     * @return $this
     */
    public function setDuration(?int $duration): static
    {
        $this->duration = $duration;

        return $this;
    }

    public function isTimeAdded(): ?bool
    {
        return $this->getDuration() > 0;
    }

    public function isTimeRemoved(): ?bool
    {
        return $this->getDuration() < 0;
    }

    public function getTimeAdded(): ?int
    {
        return $this->isTimeAdded() ? $this->getDuration() : null;
    }

    public function getTimeRemoved(): ?int
    {
        return $this->isTimeRemoved() ? abs($this->getDuration()) : null;
    }
}
