<?php

namespace Fake\ChasterObjects\Objects\Extension\TemporaryOpening;

use DateTimeInterface;
use Fake\ChasterObjects\Objects\ExtensionParty;

class ExtensionTemporaryOpening extends ExtensionParty
{
    /**
     * @var Config|null
     */
    protected $config;

    /**
     * @var UserData|null
     */
    protected $userData;

    public function getUserData(): ?UserData
    {
        return $this->userData;
    }

    /**
     * @param UserData|null $userData
     *
     * @return $this
     */
    public function setUserData($userData): static
    {
        $this->userData = $userData;

        return $this;
    }

    public function getConfig(): ?Config
    {
        return $this->config;
    }

    /**
     * @param Config|null $config
     *
     * @return $this
     */
    public function setConfig($config): static
    {
        $this->config = $config;

        return $this;
    }

    public function isOpen(): bool
    {
        return $this->getUserData()?->isOpen() ?? false;
    }

    public function canWearerUnlock(): bool
    {
        return !$this->isOpen() && !$this->getConfig()->isKeyholderOpenOnly() && $this->getNbActionsRemaining() > 0;
    }

    public function getOpenedAt(): ?DateTimeInterface
    {
        return $this->getUserData()?->getOpenedAt();
    }
}
