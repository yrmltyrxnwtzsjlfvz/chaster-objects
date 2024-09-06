<?php

namespace Fake\ChasterObjects\Objects\Extension\TemporaryOpening;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Symfony\Component\Serializer\Attribute\SerializedName;

class Config implements ExtensionConfigInterface
{
    private ?int $openingTime = null;

    private ?int $penaltyTime = null;

    #[SerializedName('allowOnlyKeyholderToOpen')]
    private ?bool $keyholderOpenOnly = null;

    public function getOpeningTime(): ?int
    {
        return $this->openingTime;
    }

    /**
     * @return $this
     */
    public function setOpeningTime(?int $openingTime): static
    {
        $this->openingTime = $openingTime;

        return $this;
    }

    public function getPenaltyTime(): ?int
    {
        return $this->penaltyTime;
    }

    /**
     * @return $this
     */
    public function setPenaltyTime(?int $penaltyTime): static
    {
        $this->penaltyTime = $penaltyTime;

        return $this;
    }

    public function isKeyholderOpenOnly(): ?bool
    {
        return $this->keyholderOpenOnly;
    }

    /**
     * @return $this
     */
    public function setKeyholderOpenOnly(?bool $keyholderOpenOnly): static
    {
        $this->keyholderOpenOnly = $keyholderOpenOnly;

        return $this;
    }
}
