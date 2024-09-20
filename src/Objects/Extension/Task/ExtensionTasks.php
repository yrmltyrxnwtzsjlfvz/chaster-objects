<?php

namespace Fake\ChasterObjects\Objects\Extension\Task;

use DateTimeInterface;
use Fake\ChasterObjects\Objects\Extension\Penalty\Punishment;

/**
 * @deprecated Since v0.4.16, this class is being renamed to {@see Extension}
 */
class ExtensionTasks extends Extension
{
    /**
     * @return array{pointsRequired: int|null, pointsEarned: int|null, pointsNeeded: int|null, assigned: Task|null, voteEndsAt: DateTimeInterface|null}
     */
    public function getTaskDetails(): array
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getTaskDetails();
    }

    /**
     * Total points required to unlock.
     */
    public function getTaskPointsRequired(): ?int
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getTaskPointsRequired();
    }

    public function getConfig(): ?Config
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getConfig();
    }

    /**
     * @param Config|null $config
     *
     * @return $this
     */
    public function setConfig($config): static
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::setConfig($config);
    }

    public function getTaskPointsEarned(): ?int
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getTaskPointsEarned();
    }

    /**
     * How many points are outstanding to be unlocked.
     */
    public function getTaskPointsNeeded(): ?int
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getTaskPointsNeeded();
    }

    public function getCurrentTask(): ?Task
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getCurrentTask();
    }

    public function hasCurrentTask(): bool
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::hasCurrentTask();
    }

    public function getUserData(): ?UserData
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getUserData();
    }

    /**
     * @param ?UserData $userData
     *
     * @return $this
     */
    public function setUserData($userData): static
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::setUserData($userData);
    }

    public function getTaskVoteEndsAt(): ?DateTimeInterface
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getTaskVoteEndsAt();
    }

    public function getTaskVoteId(): ?string
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getTaskVoteId();
    }

    public function isVoting(): bool
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::isVoting();
    }

    /**
     * @return Punishment[]|null
     */
    public function getActionsOnAbandonedTask(): ?array
    {
        trigger_deprecation('fake34526/chaster-objects', '0.4.16', 'The "%s" class is being renamed to "%s".', __CLASS__, Extension::class);

        return parent::getActionsOnAbandonedTask();
    }
}
