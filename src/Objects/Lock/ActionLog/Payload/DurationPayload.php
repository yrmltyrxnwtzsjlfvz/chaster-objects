<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

class DurationPayload
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
}
