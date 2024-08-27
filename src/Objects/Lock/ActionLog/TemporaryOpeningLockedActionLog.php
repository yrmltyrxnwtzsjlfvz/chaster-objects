<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TemporaryOpeningLockedPayload;

class TemporaryOpeningLockedActionLog extends AbstractActionLog
{
    private ?TemporaryOpeningLockedPayload $payload;

    public function getPayload(): ?TemporaryOpeningLockedPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?TemporaryOpeningLockedPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
