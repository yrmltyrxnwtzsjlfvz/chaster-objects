<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Bytes\DateBundle\Helpers\DateTimeHelper;
use Bytes\DateBundle\Objects\LargeComparableDateInterval;
use DateInterval;
use DateTimeInterface;
use Fake\ChasterObjects\Enums\ActionLogRole;
use Fake\ChasterObjects\Enums\ActionLogType;
use Fake\ChasterObjects\Objects\User as FakeUser;
use SensitiveParameter;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;
use Symfony\Component\Serializer\Annotation\SerializedName;

use function Symfony\Component\String\u;

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
abstract class AbstractActionLog implements ActionLogInterface
{
    /**
     * @var string|null
     */
    #[SerializedName('_id')]
    private $id;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $lock;

    /**
     * @var string|null
     */
    private $role;

    /**
     * @var string|null
     */
    private $extension;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var string|null
     */
    private $color;

    /**
     * @var DateTimeInterface|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $icon;

    /**
     * @var string|null
     */
    private $prefix;

    /**
     * @var FakeUser|null
     */
    private $user;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getActionLogType(): ?ActionLogType
    {
        return ActionLogType::tryNormalizeToEnum($this->getType());
    }

    /**
     * @return $this
     */
    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getLock(): ?string
    {
        return $this->lock;
    }

    /**
     * @return $this
     */
    public function setLock(?string $lock): static
    {
        $this->lock = $lock;

        return $this;
    }

    public function getRoleEnum(): ?ActionLogRole
    {
        return is_null($this->getRole()) ? null : ActionLogRole::normalizeToEnum($this->getRole());
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    /**
     * @return $this
     */
    public function setRole(ActionLogRole|string $role): static
    {
        $this->role = ActionLogRole::normalizeToValue($role);

        return $this;
    }

    public function getExtension(): ?string
    {
        return $this->extension;
    }

    /**
     * @return $this
     */
    public function setExtension(?string $extension): static
    {
        $this->extension = $extension;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @return $this
     */
    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(#[SensitiveParameter] ?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPilloryLength(): ?int
    {
        return LargeComparableDateInterval::getTotalSeconds(DateInterval::createFromDateString(u($this->getDescription())->before(':')->after('In pillory for')->trim()->toString()));
    }

    public function getPilloryReason(): string
    {
        return u($this->getDescription())->after(':');
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @return $this
     */
    public function setColor(?string $color): static
    {
        $this->color = $color;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return $this
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTimeSince(): ?DateInterval
    {
        return $this->getCreatedAt()?->diff(DateTimeHelper::getNowUTC());
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return $this
     */
    public function setIcon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @return $this
     */
    public function setPrefix(?string $prefix): static
    {
        $this->prefix = $prefix;

        return $this;
    }

    public function getUser(): ?FakeUser
    {
        return $this->user;
    }

    /**
     * @return $this
     */
    public function setUser(?FakeUser $user): static
    {
        $this->user = $user;

        return $this;
    }
}
