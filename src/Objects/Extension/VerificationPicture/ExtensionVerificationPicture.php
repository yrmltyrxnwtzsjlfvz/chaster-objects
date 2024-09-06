<?php

namespace Fake\ChasterObjects\Objects\Extension\VerificationPicture;

use Fake\ChasterObjects\Objects\Extension\VerificationPicture\Config;
use Fake\ChasterObjects\Objects\Extension\VerificationPicture\UserData;
use Bytes\DateBundle\Helpers\DateTimeHelper;
use DateInterval;
use DateTimeImmutable;
use Fake\ChasterObjects\Objects\ExtensionParty;

class ExtensionVerificationPicture extends ExtensionParty
{
    /**
     * @var Config|null
     */
    private ?Config $config = null;

    /**
     * @var UserData|null
     */
    private ?UserData $userData;

    public function getUserData(): ?UserData
    {
        return $this->userData;
    }

    /**
     * @param UserData|null $userData
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

    public function getRequestedAt(): ?DateTimeImmutable
    {
        $return = $this->getUserData()?->getRequestedAt();
        if (is_null($return)) {
            return null;
        }

        return DateTimeImmutable::createFromInterface($return)->setTimezone(DateTimeHelper::getTimeZoneUTC());
    }

    public function isVerificationPictureNeeded(): bool
    {
        return !is_null($this->getUserData()?->getRequestedAt());
    }

    public function hasRequestExpired(DateInterval $allowableTime)
    {
        $requestedAt = $this->getRequestedAt();
        if (empty($requestedAt)) {
            return false;
        }

        $now = new DateTimeImmutable();

        return $requestedAt->add($allowableTime) > $now;
    }
}
