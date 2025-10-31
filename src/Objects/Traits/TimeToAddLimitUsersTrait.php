<?php

namespace Fake\ChasterObjects\Objects\Traits;

use Bytes\DateBundle\Objects\ComparableDateInterval;
use DateInterval;
use Symfony\Component\Serializer\Annotation\SerializedName;

trait TimeToAddLimitUsersTrait
{
    /**
     * @var int|null
     */
    private $timeToAdd;

    /**
     * @var bool|null
     */
    #[SerializedName('limitToLoggedUsers')]
    private $limitedToLoggedInUsersOnly;

    public function getTimeToAdd(): ?int
    {
        return $this->timeToAdd;
    }

    public function getTimeToAddInterval(): ?DateInterval
    {
        if (empty($this->getTimeToAdd())) {
            return null;
        }

        return ComparableDateInterval::normalizeToDateInterval($this->getTimeToAdd());
    }

    /**
     * @return $this
     */
    public function setTimeToAdd(?int $timeToAdd): static
    {
        $this->timeToAdd = $timeToAdd;

        return $this;
    }

    public function isLimitedToLoggedInUsersOnly(): ?bool
    {
        return $this->limitedToLoggedInUsersOnly;
    }

    /**
     * @return $this
     */
    public function setLimitedToLoggedInUsersOnly(?bool $limitedToLoggedInUsersOnly): static
    {
        $this->limitedToLoggedInUsersOnly = $limitedToLoggedInUsersOnly;

        return $this;
    }
}
