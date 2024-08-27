<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

use Symfony\Component\Serializer\Attribute\SerializedName;

class DicePayload extends DurationPayload
{
    #[SerializedName('adminDice')]
    private ?int $keyholderRoll = null;

    #[SerializedName('playerDice')]
    private ?int $wearerRoll = null;

    public function getKeyholderRoll(): ?int
    {
        return $this->keyholderRoll;
    }

    /**
     * @return $this
     */
    public function setKeyholderRoll(?int $keyholderRoll): static
    {
        $this->keyholderRoll = $keyholderRoll;

        return $this;
    }

    public function getWearerRoll(): ?int
    {
        return $this->wearerRoll;
    }

    /**
     * @return $this
     */
    public function setWearerRoll(?int $wearerRoll): static
    {
        $this->wearerRoll = $wearerRoll;

        return $this;
    }
}
