<?php

namespace Fake\ChasterObjects\Objects\Extension\Task;

use DateTimeInterface;
use Fake\ChasterObjects\Enums\TaskStatus;
use Fake\ChasterObjects\Objects\Extension\Task\Vote\VoteEndsAtTrait;

class UserData
{
    use VoteEndsAtTrait;

    /**
     * @var Task[]|null
     */
    private ?array $userTasks = [];

    private ?DateTimeInterface $voteStartedAt = null;

    private ?Task $currentTask = null;

    private ?string $currentTaskVote = null;

    private ?TaskStatus $status = null;

    private ?int $points = null;

    /**
     * @return Task[]|null
     */
    public function getUserTasks(): ?array
    {
        return $this->userTasks;
    }

    /**
     * @param Task[]|null $userTasks
     *
     * @return $this
     */
    public function setUserTasks(?array $userTasks): static
    {
        $this->userTasks = $userTasks;

        return $this;
    }

    public function getVoteStartedAt(): ?DateTimeInterface
    {
        return $this->voteStartedAt;
    }

    /**
     * @return $this
     */
    public function setVoteStartedAt(?DateTimeInterface $voteStartedAt): static
    {
        $this->voteStartedAt = $voteStartedAt;

        return $this;
    }

    public function getCurrentTask(): ?Task
    {
        return $this->currentTask;
    }

    /**
     * @return $this
     */
    public function setCurrentTask(?Task $currentTask): static
    {
        $this->currentTask = $currentTask;

        return $this;
    }

    public function getCurrentTaskVote(): ?string
    {
        return $this->currentTaskVote;
    }

    /**
     * @return $this
     */
    public function setCurrentTaskVote(?string $currentTaskVote): static
    {
        $this->currentTaskVote = $currentTaskVote;

        return $this;
    }

    public function getStatus(): ?TaskStatus
    {
        return $this->status;
    }

    /**
     * @return $this
     */
    public function setStatus(TaskStatus|string|null $status): static
    {
        $this->status = !is_null($status) ? TaskStatus::tryNormalizeToEnum($status) : null;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @return $this
     */
    public function setPoints(?int $points): static
    {
        $this->points = $points;

        return $this;
    }

    public function getTaskVoteEndsAt(): ?DateTimeInterface
    {
        return $this->getVoteEndsAt();
    }

    public function getTaskVoteId(): ?string
    {
        return $this->getCurrentTaskVote();
    }

    public function isVoting(): bool
    {
        return $this->getStatus()?->equals(TaskStatus::VOTE) || !empty($this->getTaskVoteEndsAt());
    }
}
