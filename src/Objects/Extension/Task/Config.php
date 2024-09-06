<?php

namespace Fake\ChasterObjects\Objects\Extension\Task;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Fake\ChasterObjects\Objects\Extension\Penalty\Punishment;

class Config implements ExtensionConfigInterface
{
    /**
     * @var Task[]|null
     */
    private ?array $tasks = null;

    private ?bool $voteEnabled = null;

    private ?int $voteDuration = null;

    private ?bool $startVoteAfterLastVote = null;

    private ?bool $enablePoints = null;

    private ?int $pointsRequired = null;

    private ?bool $allowWearerToEditTasks = null;

    private ?bool $allowWearerToConfigureTasks = null;

    private ?bool $preventWearerFromAssigningTasks = null;

    private ?bool $allowWearerToChooseTasks = null;

    /**
     * @var Punishment[]|null
     */
    private ?array $actionsOnAbandonedTask = null;

    /**
     * @return Task[]|null
     */
    public function getTasks(): ?array
    {
        return $this->tasks;
    }

    /**
     * @param Task[]|null $tasks
     *
     * @return $this
     */
    public function setTasks(?array $tasks): static
    {
        $this->tasks = $tasks;

        return $this;
    }

    public function getVoteEnabled(): ?bool
    {
        return $this->voteEnabled;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setVoteEnabled(?bool $voteEnabled): static
    {
        $this->voteEnabled = $voteEnabled;

        return $this;
    }

    public function getVoteDuration(): ?int
    {
        return $this->voteDuration;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setVoteDuration(?int $voteDuration): static
    {
        $this->voteDuration = $voteDuration;

        return $this;
    }

    public function getStartVoteAfterLastVote(): ?bool
    {
        return $this->startVoteAfterLastVote;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setStartVoteAfterLastVote(?bool $startVoteAfterLastVote): static
    {
        $this->startVoteAfterLastVote = $startVoteAfterLastVote;

        return $this;
    }

    public function getEnablePoints(): ?bool
    {
        return $this->enablePoints;
    }

    /**
     * @return $this
     */
    public function setEnablePoints(?bool $enablePoints): static
    {
        $this->enablePoints = $enablePoints;

        return $this;
    }

    public function getPointsRequired(): ?int
    {
        return $this->pointsRequired;
    }

    /**
     * @return $this
     */
    public function setPointsRequired(?int $pointsRequired): static
    {
        $this->pointsRequired = $pointsRequired;

        return $this;
    }

    public function getAllowWearerToEditTasks(): ?bool
    {
        return $this->allowWearerToEditTasks;
    }

    /**
     * @return $this
     */
    public function setAllowWearerToEditTasks(?bool $allowWearerToEditTasks): static
    {
        $this->allowWearerToEditTasks = $allowWearerToEditTasks;

        return $this;
    }

    public function getAllowWearerToConfigureTasks(): ?bool
    {
        return $this->allowWearerToConfigureTasks;
    }

    /**
     * @return $this
     */
    public function setAllowWearerToConfigureTasks(?bool $allowWearerToConfigureTasks): static
    {
        $this->allowWearerToConfigureTasks = $allowWearerToConfigureTasks;

        return $this;
    }

    public function getPreventWearerFromAssigningTasks(): ?bool
    {
        return $this->preventWearerFromAssigningTasks;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setPreventWearerFromAssigningTasks(?bool $preventWearerFromAssigningTasks): static
    {
        $this->preventWearerFromAssigningTasks = $preventWearerFromAssigningTasks;

        return $this;
    }

    public function getAllowWearerToChooseTasks(): ?bool
    {
        return $this->allowWearerToChooseTasks;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setAllowWearerToChooseTasks(?bool $allowWearerToChooseTasks): static
    {
        $this->allowWearerToChooseTasks = $allowWearerToChooseTasks;

        return $this;
    }

    /**
     * @param int $choice = [0, 1, 2][$index] 0 = cannot assign, 1 = can assign random/vote, 2 = assign specific
     *
     * @return $this
     */
    public function setWearerTaskAssignmentPermissions(int $choice = 0): static
    {
        if ($choice >= 2) {
            $assignSpecific = true;
            $assignRandom = true;
        } elseif ($choice <= 0) {
            $assignSpecific = false;
            $assignRandom = false;
        } else {
            $assignSpecific = false;
            $assignRandom = true;
        }

        return $this->setPreventWearerFromAssigningTasks(!$assignRandom)
            ->setAllowWearerToChooseTasks($assignSpecific);
    }

    /**
     * @return Punishment[]|null
     */
    public function getActionsOnAbandonedTask(): ?array
    {
        return $this->actionsOnAbandonedTask;
    }

    /**
     * @param Punishment[]|null $actionsOnAbandonedTask
     *
     * @return $this
     */
    public function setActionsOnAbandonedTask(?array $actionsOnAbandonedTask): static
    {
        $this->actionsOnAbandonedTask = $actionsOnAbandonedTask;

        return $this;
    }
}
