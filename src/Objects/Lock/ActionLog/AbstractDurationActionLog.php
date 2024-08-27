<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\DurationPayload;

abstract class AbstractDurationActionLog extends AbstractActionLog
{
    private ?DurationPayload $payload;

    public function getPayload(): ?DurationPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?DurationPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
