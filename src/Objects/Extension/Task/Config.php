<?php

namespace Fake\ChasterObjects\Objects\Extension\Task;

use Fake\ChasterObjects\Enums\PunishmentType;
use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Fake\ChasterObjects\Objects\Extension\Penalty\Punishment;
use Illuminate\Support\Arr;
use JetBrains\PhpStorm\Deprecated;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

class Config implements ExtensionConfigInterface
{
    /**
     * @var Task[]|null
     */
    private ?array $tasks = null;

    private ?bool $voteEnabled = null;

    private ?int $voteDuration = null;

    private ?bool $startVoteAfterLastVote = null;

    #[SerializedName('enablePoints')]
    private ?bool $points = null;

    #[Assert\PositiveOrZero]
    private ?int $pointsRequired = null;

    #[SerializedName('allowWearerToEditTasks')]
    private ?bool $wearerAllowedToEditTasks = null;

    #[SerializedName('allowWearerToEditTasks')]
    private ?bool $wearerAllowedToConfigureTasks = null;

    #[SerializedName('preventWearerFromAssigningTasks')]
    private ?bool $wearerPreventedFromAssigningTasks = null;

    #[SerializedName('allowWearerToChooseTasks')]
    private ?bool $wearerAllowedToChooseTasks = null;

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

    public function hasPoints(): ?bool
    {
        return $this->points;
    }

    /**
     * @return $this
     */
    public function setPoints(?bool $points): static
    {
        $this->points = $points;

        return $this;
    }

    #[Deprecated('Since 0.4.9, use hasPoints() instead', '%class%->hasPoints()')]
    public function getEnablePoints(): ?bool
    {
        return $this->hasPoints();
    }

    /**
     * @return $this
     */
    #[Deprecated('Since 0.4.9, use setPoints() instead', '%class%->setPoints(%parameter0%)')]
    public function setEnablePoints(?bool $enablePoints): static
    {
        return $this->setPoints($enablePoints);
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

    #[Deprecated('Since 0.4.11, use isWearerAllowedToEditTasks() instead', '%class%->isWearerAllowedToEditTasks()')]
    public function getAllowWearerToEditTasks(): ?bool
    {
        return $this->isWearerAllowedToEditTasks();
    }

    #[Deprecated('Since 0.4.11, use setWearerAllowedToEditTasks() instead', '%class%->setWearerAllowedToEditTasks(%parameter0%)')]
    public function setAllowWearerToEditTasks(?bool $allowWearerToEditTasks): static
    {
        return $this->setWearerAllowedToEditTasks($allowWearerToEditTasks);
    }

    public function isWearerAllowedToEditTasks(): ?bool
    {
        return $this->wearerAllowedToEditTasks;
    }

    /**
     * @return $this
     */
    public function setWearerAllowedToEditTasks(?bool $wearerAllowedToEditTasks): static
    {
        $this->wearerAllowedToEditTasks = $wearerAllowedToEditTasks;

        return $this;
    }

    #[Deprecated('Since 0.4.11, use isWearerAllowedToConfigureTasks() instead', '%class%->isWearerAllowedToConfigureTasks()')]
    public function getAllowWearerToConfigureTasks(): ?bool
    {
        return $this->isWearerAllowedToConfigureTasks();
    }

    #[Deprecated('Since 0.4.11, use setWearerAllowedToConfigureTasks() instead', '%class%->setWearerAllowedToConfigureTasks(%parameter0%)')]
    public function setAllowWearerToConfigureTasks(?bool $allowWearerToConfigureTasks): static
    {
        return $this->setWearerAllowedToConfigureTasks($allowWearerToConfigureTasks);
    }

    public function isWearerAllowedToConfigureTasks(): ?bool
    {
        return $this->wearerAllowedToConfigureTasks;
    }

    /**
     * @return $this
     */
    public function setWearerAllowedToConfigureTasks(?bool $wearerAllowedToConfigureTasks): static
    {
        $this->wearerAllowedToConfigureTasks = $wearerAllowedToConfigureTasks;

        return $this;
    }

    #[Deprecated('Since 0.4.11, use isWearerPreventedFromAssigningTasks() instead', '%class%->isWearerPreventedFromAssigningTasks()')]
    public function getPreventWearerFromAssigningTasks(): ?bool
    {
        return $this->isWearerPreventedFromAssigningTasks();
    }

    #[Deprecated('Since 0.4.11, use setWearerPreventedFromAssigningTasks() instead', '%class%->setWearerPreventedFromAssigningTasks(%parameter0%)')]
    public function setPreventWearerFromAssigningTasks(?bool $preventWearerFromAssigningTasks): static
    {
        return $this->setWearerPreventedFromAssigningTasks($preventWearerFromAssigningTasks);
    }

    public function isWearerPreventedFromAssigningTasks(): ?bool
    {
        return $this->wearerPreventedFromAssigningTasks;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setWearerPreventedFromAssigningTasks(?bool $wearerPreventedFromAssigningTasks): static
    {
        $this->wearerPreventedFromAssigningTasks = $wearerPreventedFromAssigningTasks;

        return $this;
    }

    #[Deprecated('Since 0.4.11, use isWearerAllowedToChooseTasks() instead', '%class%->isWearerAllowedToChooseTasks()')]
    public function getAllowWearerToChooseTasks(): ?bool
    {
        return $this->isWearerAllowedToChooseTasks();
    }

    #[Deprecated('Since 0.4.11, use setWearerAllowedToChooseTasks() instead', '%class%->setWearerAllowedToChooseTasks(%parameter0%)')]
    public function setAllowWearerToChooseTasks(?bool $allowWearerToChooseTasks): static
    {
        return $this->setWearerAllowedToChooseTasks($allowWearerToChooseTasks);
    }

    public function isWearerAllowedToChooseTasks(): ?bool
    {
        return $this->wearerAllowedToChooseTasks;
    }

    /**
     * @psalm-internal
     *
     * @return $this
     */
    public function setWearerAllowedToChooseTasks(?bool $wearerAllowedToChooseTasks): static
    {
        $this->wearerAllowedToChooseTasks = $wearerAllowedToChooseTasks;

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

        return $this->setWearerPreventedFromAssigningTasks(!$assignRandom)
            ->setWearerAllowedToChooseTasks($assignSpecific);
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

    public function hasPunishment(PunishmentType $type): bool
    {
        return !empty(Arr::where($this->getActionsOnAbandonedTask(), function (Punishment $punishment) use ($type) {
            return $punishment->getType()->equals($type);
        }));
    }

    #[Assert\Callback]
    public function validateAllowWearerToChooseTasks(ExecutionContextInterface $context, mixed $payload): void
    {
        if ($this->isWearerPreventedFromAssigningTasks() && $this->isWearerAllowedToChooseTasks()) {
            $context->buildViolation('The wearer cannot choose their task if they cannot assign their own tasks.')
                ->atPath('allowWearerToChooseTasks')
                ->addViolation();
        }
    }

    #[Assert\Callback]
    public function validatePointsRequired(ExecutionContextInterface $context, mixed $payload): void
    {
        if ($this->hasPoints() && empty($this->getPointsRequired())) {
            $context->buildViolation('Points required must be 1 or higher if points are enabled.')
                ->atPath('pointsRequired')
                ->addViolation();
        } elseif (!$this->hasPoints() && !empty($this->getPointsRequired())) {
            $context->buildViolation('Points required must be 0 if points are disabled.')
                ->atPath('pointsRequired')
                ->addViolation();
        }
    }
}
