<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TimeAddedPayload;

class PilloryOutActionLog extends AbstractActionLog
{
    private ?TimeAddedPayload $payload;

    public function getPayload(): ?TimeAddedPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?TimeAddedPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
