<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Fake\ChasterObjects\Objects\Traits\TimeToAddLimitUsersTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Config implements ExtensionConfigInterface
{
    use TimeToAddLimitUsersTrait;

    /**
     * @var int|null
     */
    private $timeToRemove;

    /**
     * @var bool|null
     */
    #[SerializedName('enableRandom')]
    private $randomEnabled;

    /**
     * @var int|null
     */
    #[SerializedName('nbVisits')]
    private $numberOfVisitsNeeded;

    public function getTimeToRemove(): ?int
    {
        return $this->timeToRemove;
    }

    public function setTimeToRemove(?int $timeToRemove): Config
    {
        $this->timeToRemove = $timeToRemove;

        return $this;
    }

    public function isRandomEnabled(): ?bool
    {
        return $this->randomEnabled;
    }

    public function setRandomEnabled(?bool $randomEnabled): Config
    {
        $this->randomEnabled = $randomEnabled;

        return $this;
    }

    public function getNumberOfVisitsNeeded(): ?int
    {
        return $this->numberOfVisitsNeeded;
    }

    public function setNumberOfVisitsNeeded(?int $numberOfVisitsNeeded): Config
    {
        $this->numberOfVisitsNeeded = $numberOfVisitsNeeded;

        return $this;
    }
}
