<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

class LinkTimeChangedPayload extends DurationPayload
{
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
