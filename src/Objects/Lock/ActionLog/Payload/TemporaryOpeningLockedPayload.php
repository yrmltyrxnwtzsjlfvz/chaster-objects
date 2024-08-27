<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

class TemporaryOpeningLockedPayload
{
    private int|float|null $unlockedTime = null;

    private int|float|null $penaltyTime = null;

    public function getUnlockedTime(): float|int|null
    {
        return $this->unlockedTime;
    }

    /**
     * @return $this
     */
    public function setUnlockedTime(float|int|null $unlockedTime): static
    {
        $this->unlockedTime = $unlockedTime;

        return $this;
    }

    public function getPenaltyTime(): float|int|null
    {
        return $this->penaltyTime;
    }

    /**
     * @return $this
     */
    public function setPenaltyTime(float|int|null $penaltyTime): static
    {
        $this->penaltyTime = $penaltyTime;

        return $this;
    }
}
