<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

class PilloryInPayload extends DurationPayload
{
    private ?string $reason = null;

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(?string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }
}
