<?php

namespace Fake\ChasterObjects\Objects\Extension\Task;

use DateTimeInterface;
use Fake\ChasterObjects\Objects\Extension\Penalty\Punishment;
use Fake\ChasterObjects\Objects\ExtensionParty;

class ExtensionTasks extends ExtensionParty
{
    /**
     * @var Config|null
     */
    private $config;

    /**
     * @var UserData|null
     */
    private $userData;

    /**
     * @return array{pointsRequired: int|null, pointsEarned: int|null, pointsNeeded: int|null, assigned: Task|null, voteEndsAt: DateTimeInterface|null}
     */
    public function getTaskDetails(): array
    {
        return [
            'pointsRequired' => $this->getTaskPointsRequired(),
            'pointsEarned' => $this->getTaskPointsEarned(),
            'pointsNeeded' => $this->getTaskPointsNeeded(),
            'assigned' => $this->getTaskAssigned(),
            'voteEndsAt' => $this->getTaskVoteEndsAt(),
        ];
    }

    /**
     * Total points required to unlock.
     */
    public function getTaskPointsRequired(): ?int
    {
        return $this->getConfig()->getPointsRequired();
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

    public function getTaskPointsEarned(): ?int
    {
        return $this->getUserData()->getPoints();
    }

    /**
     * How many points are outstanding to be unlocked.
     */
    public function getTaskPointsNeeded(): ?int
    {
        return $this->getTaskPointsRequired() - $this->getTaskPointsEarned();
    }

    public function getTaskAssigned(): ?Task
    {
        return $this->getUserData()?->getCurrentTask();
    }

    public function getCurrentTask(): ?Task
    {
        return $this->getUserData()?->getCurrentTask();
    }

    public function hasCurrentTask(): bool
    {
        return !empty($this->getCurrentTask());
    }

    public function getUserData(): ?UserData
    {
        return $this->userData;
    }

    /**
     * @param ?UserData $userData
     *
     * @return $this
     */
    public function setUserData($userData): static
    {
        $this->userData = $userData;

        return $this;
    }

    public function getTaskVoteEndsAt(): ?DateTimeInterface
    {
        return $this->getUserData()?->getTaskVoteEndsAt();
    }

    public function getTaskVoteId(): ?string
    {
        return $this->getUserData()?->getTaskVoteId();
    }

    public function isVoting(): bool
    {
        return $this->getUserData()?->isVoting() ?? false;
    }

    /**
     * @return Punishment[]|null
     */
    public function getActionsOnAbandonedTask(): ?array
    {
        return $this->getConfig()?->getActionsOnAbandonedTask();
    }
}
