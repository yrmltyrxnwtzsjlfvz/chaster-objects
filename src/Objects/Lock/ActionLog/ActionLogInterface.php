<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use DateInterval;
use DateTimeInterface;
use Fake\ChasterObjects\Enums\ActionLogRole;
use Fake\ChasterObjects\Enums\ActionLogType;
use Fake\ChasterObjects\Objects\User as FakeUser;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: 'type', mapping: [
    'combination_verified' => CombinationVerifiedActionLog::class,
    'dice_rolled' => DiceRolledActionLog::class,
    'extension_disabled' => ExtensionDisabledActionLog::class,
    'extension_enabled' => ExtensionEnabledActionLog::class,
    'extension_updated' => ExtensionUpdatedActionLog::class,
    'keyholder_trusted' => KeyholderTrustedActionLog::class,
    'link_time_changed' => LinkTimeChangedActionLog::class,
    'locked' => LockedActionLog::class,
    'lock_frozen' => LockFrozenActionLog::class,
    'lock_unfrozen' => LockUnfrozenActionLog::class,
    'max_limit_date_increased' => MaxLimitDateIncreasedActionLog::class,
    'max_limit_date_removed' => MaxLimitDateRemovedActionLog::class,
    'pillory_in' => PilloryInActionLog::class,
    'pillory_out' => PilloryOutActionLog::class,
    'session_offer_accepted' => SessionOfferAcceptedActionLog::class,
    'tasks_task_assigned' => TasksTaskAssignedActionLog::class,
    'tasks_task_completed' => TasksTaskCompletedActionLog::class,
    'tasks_task_failed' => TasksTaskFailedActionLog::class,
    'tasks_vote_ended' => TasksVoteEndedActionLog::class,
    'temporary_opening_locked' => TemporaryOpeningLockedActionLog::class,
    'temporary_opening_locked_late' => TemporaryOpeningLockedLateActionLog::class,
    'temporary_opening_opened' => TemporaryOpeningOpenedActionLog::class,
    'timer_guessed' => TimerGuessedActionLog::class,
    'timer_hidden' => TimerHiddenActionLog::class,
    'timer_revealed' => TimerRevealedActionLog::class,
    'time_changed' => TimeChangedActionLog::class,
    'time_logs_hidden' => TimeLogsHiddenActionLog::class,
    'time_logs_revealed' => TimeLogsRevealedActionLog::class,
    'unlocked' => UnlockedActionLog::class,
    'verification_picture_submitted' => VerificationPictureSubmittedActionLog::class,
    'wheel_of_fortune_turned' => WheelOfFortuneTurnedActionLog::class,
    'custom' => CustomActionLog::class,
])]
interface ActionLogInterface
{
    public function getId(): ?string;

    public function getType(): ?string;

    public function getActionLogType(): ?ActionLogType;

    public function getLock(): ?string;

    public function getRoleEnum(): ?ActionLogRole;

    public function getRole(): ?string;

    public function getExtension(): ?string;

    public function getTitle(): ?string;

    public function getDescription(): ?string;

    public function getColor(): ?string;

    public function getCreatedAt(): ?DateTimeInterface;

    public function getTimeSince(): ?DateInterval;

    public function getIcon(): ?string;

    public function getPrefix(): ?string;

    public function getUser(): ?FakeUser;

    public function getPayload();
}
