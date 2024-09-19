<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\LinkTimeChangedPayload;

class LinkTimeChangedActionLog extends AbstractActionLog
{
    protected ?string $type = 'link_time_changed';

    private ?LinkTimeChangedPayload $payload;

    public function getPayload(): ?LinkTimeChangedPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?LinkTimeChangedPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
