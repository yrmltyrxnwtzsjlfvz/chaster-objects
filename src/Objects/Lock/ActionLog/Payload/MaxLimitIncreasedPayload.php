<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

use DateTimeInterface;

class MaxLimitIncreasedPayload
{
    private ?DateTimeInterface $date = null;

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @return $this
     */
    public function setDate(?DateTimeInterface $date): static
    {
        $this->date = $date;

        return $this;
    }
}
