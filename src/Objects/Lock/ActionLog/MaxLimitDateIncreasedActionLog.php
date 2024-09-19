<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\MaxLimitIncreasedPayload;

class MaxLimitDateIncreasedActionLog extends AbstractActionLog
{
    protected ?string $type = 'max_limit_date_increased';

    private ?MaxLimitIncreasedPayload $payload;

    public function getPayload(): ?MaxLimitIncreasedPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?MaxLimitIncreasedPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
