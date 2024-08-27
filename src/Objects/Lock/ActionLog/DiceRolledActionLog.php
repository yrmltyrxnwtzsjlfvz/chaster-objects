<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\DicePayload;

class DiceRolledActionLog extends AbstractActionLog
{
    private ?DicePayload $payload;

    public function getPayload(): ?DicePayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?DicePayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
