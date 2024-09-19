<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\PilloryInPayload;

class PilloryInActionLog extends AbstractActionLog
{
    protected ?string $type = 'pillory_in';

    private ?PilloryInPayload $payload;

    public function getPayload(): ?PilloryInPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?PilloryInPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
