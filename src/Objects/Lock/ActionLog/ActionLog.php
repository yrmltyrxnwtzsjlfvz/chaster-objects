<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

class ActionLog
{
    private $payload;

    public function getPayload()
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload($payload): static
    {
        $this->payload = $payload;

        return $this;
    }

    public function getPayloadDuration(): ?int
    {
        if (array_key_exists('duration', $this->getPayload())) {
            return $this->getPayload()['duration'];
        }

        return null;
    }

    public function getPayloadUnlockedTime(): ?int
    {
        if (array_key_exists('unlockedTime', $this->getPayload())) {
            return $this->getPayload()['unlockedTime'];
        }

        return null;
    }

    public function getPayloadTimeAdded(): ?int
    {
        if (array_key_exists('timeAdded', $this->getPayload())) {
            return $this->getPayload()['timeAdded'];
        }

        return null;
    }
}
