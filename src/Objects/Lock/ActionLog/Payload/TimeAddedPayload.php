<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

class TimeAddedPayload
{
    private ?int $timeAdded = null;

    public function getTimeAdded(): ?int
    {
        return $this->timeAdded;
    }

    /**
     * @return $this
     */
    public function setTimeAdded(?int $timeAdded): static
    {
        $this->timeAdded = $timeAdded;

        return $this;
    }
}
