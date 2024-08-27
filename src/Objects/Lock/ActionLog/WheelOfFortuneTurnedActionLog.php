<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\WheelOfFortunePayload;

class WheelOfFortuneTurnedActionLog extends AbstractActionLog
{
    private ?WheelOfFortunePayload $payload;

    public function getPayload(): ?WheelOfFortunePayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?WheelOfFortunePayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
