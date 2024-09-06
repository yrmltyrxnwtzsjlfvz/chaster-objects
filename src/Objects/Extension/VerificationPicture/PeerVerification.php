<?php

namespace Fake\ChasterObjects\Objects\Extension\VerificationPicture;

use Fake\ChasterObjects\Objects\Extension\Penalty\Punishment;

class PeerVerification
{
    /**
     * @var bool|null
     */
    private ?bool $enabled = null;

    /**
     * @var Punishment[]|null
     */
    private ?array $punishments = null;

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @return $this
     */
    public function setEnabled(?bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return Punishment[]|null
     */
    public function getPunishments(): ?array
    {
        return $this->punishments;
    }

    /**
     * @param Punishment[]|null $punishments
     *
     * @return $this
     */
    public function setPunishments(?array $punishments): static
    {
        $this->punishments = $punishments;

        return $this;
    }
}
