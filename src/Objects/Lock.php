<?php

namespace Fake\ChasterObjects\Objects;

use Bytes\DateBundle\Helpers\DateTimeHelper;
use Bytes\DateBundle\Objects\ComparableDateInterval;
use Bytes\DateBundle\Objects\LargeComparableDateInterval;
use Bytes\StringMaskBundle\Twig\StringMaskRuntime;
use DateInterval;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Fake\ChasterObjects\Enums\ChasterExtension;
use Fake\ChasterObjects\Enums\ChasterLockStatus;
use Fake\ChasterObjects\Enums\HomeAction;
use Fake\ChasterObjects\Enums\KeyholderUnavailable;
use Fake\ChasterObjects\Enums\LockRole;
use Fake\ChasterObjects\Enums\ReasonPreventingUnlock;
use Fake\ChasterObjects\Objects\Extension\TemporaryOpening\ExtensionTemporaryOpening;
use Fake\ChasterObjects\Objects\Extension\VerificationPicture\ExtensionVerificationPicture;
use Fake\ChasterObjects\Objects\Interfaces\FormattedNameInterface;
use Fake\ChasterObjects\Objects\Interfaces\LockInterface;
use Fake\ChasterObjects\Objects\Lock\ReasonPreventingUnlocking;
use Fake\ChasterObjects\Objects\Lock\SharedLock;
use Fake\ChasterObjects\Objects\Traits\ChasterIdTrait;
use Fake\ChasterObjects\Objects\Traits\CreatedAtTrait;
use Fake\ChasterObjects\Objects\Traits\LockIdNormalizerTrait;
use Fake\ChasterObjects\Objects\Traits\LockTrait;
use Illuminate\Support\Arr;
use Symfony\Component\Serializer\Annotation\SerializedName;

use function Symfony\Component\String\u;

/**
 * @method Extension\Dice\Extension|null           getDice()
 * @method Extension\GuessTimer\Extension|null     getGuessTimer()
 * @method Extension\Link\Extension|null           getLink()
 * @method Extension\Penalty\Extension|null        getPenalty()
 * @method Extension\Pillory\Extension|null        getPillory()
 * @method Extension\RandomEvents\Extension|null   getRandomEvents()
 * @method Extension\Task\Extension|null           getTasks()
 * @method ExtensionTemporaryOpening|null          getTemporaryOpening()
 * @method ExtensionVerificationPicture|null       getVerificationPicture()
 * @method Extension\WheelOfFortune\Extension|null getWheelOfFortune()
 * @method bool                                    hasDice()
 * @method bool                                    hasGuessTimer()
 * @method bool                                    hasLink()
 * @method bool                                    hasPenalty()
 * @method bool                                    hasPillory()
 * @method bool                                    hasRandomEvents()
 * @method bool                                    hasTasks()
 * @method bool                                    hasTemporaryOpening()
 * @method bool                                    hasVerificationPicture()
 * @method bool                                    hasWheelOfFortune()
 * @method bool                                    hasAnyGame()             Returns true if dice or wheel-of-fortune is present
 */
class Lock implements LockInterface, FormattedNameInterface
{
    use ChasterIdTrait;
    use CreatedAtTrait;
    use LockTrait;
    use LockIdNormalizerTrait;

    private ?ChasterLockStatus $status = null;

    private ?SharedLock $sharedLock = null;

    private ?DateTimeInterface $endDate = null;

    private ?string $title = null;

    private ?int $totalDuration = null;

    #[SerializedName('isTestLock')]
    private ?bool $testLock = null;

    private ?LockRole $role = null;

    #[SerializedName('isAllowedToViewTime')]
    private ?bool $allowedToViewTime = null;

    #[SerializedName('canBeUnlocked')]
    private ?bool $lockUnlockable = null;

    private ?bool $canBeUnlockedByMaxLimitDate = null;

    #[SerializedName('isFrozen')]
    private ?bool $frozen = null;

    /**
     * @var ExtensionParty[]|null
     */
    private ?array $extensions = [];

    /**
     * @var ExtensionHomeActionWithPartyId[]
     */
    private array $availableHomeActions = [];

    /**
     * @var ReasonPreventingUnlocking[]
     */
    private array $reasonsPreventingUnlocking = [];

    private ?bool $extensionsAllowUnlocking = null;

    private ?DateTimeInterface $updatedAt = null;

    private ?DateTimeInterface $startDate = null;

    private ?DateTimeInterface $minDate = null;

    private ?DateTimeInterface $maxDate = null;

    private ?bool $displayRemainingTime = null;

    private ?bool $limitLockTime = null;

    private ?DateTimeInterface $deletedAt = null;

    private ?DateTimeInterface $unlockedAt = null;

    private ?DateTimeInterface $archivedAt = null;

    private ?DateTimeInterface $frozenAt = null;

    private ?DateTimeInterface $keyholderArchivedAt = null;

    private ?bool $hideTimeLogs = null;

    /**
     * Whether the keyholder is trusted.
     */
    private ?bool $trusted = null;

    private ?User $user = null;

    private ?User $keyholder = null;

    private ?KeyholderUnavailable $keyholderUnavailable = null;

    private $isAllowedToViewTime = true;

    public function getStatus(): ?ChasterLockStatus
    {
        return $this->status;
    }

    public function getStatusValue(): ?string
    {
        return $this->status?->value;
    }

    /**
     * @return $this
     */
    public function setStatus(?ChasterLockStatus $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getSharedLock(): ?SharedLock
    {
        return $this->sharedLock;
    }

    /**
     * @return $this
     */
    public function setSharedLock(?SharedLock $sharedLock): static
    {
        $this->sharedLock = $sharedLock;

        return $this;
    }

    public function isSharedLock(?string $lockId = null): bool
    {
        if (is_null($this->getSharedLock())) {
            return false;
        }

        if (empty($lockId)) {
            return true;
        }

        return $this->getSharedLock()->getId() === $lockId;
    }

    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @return $this
     */
    public function setEndDate(?DateTimeInterface $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getDisplayEndDate(): ?DateTimeInterface
    {
        if (is_null($this->getEndDate())) {
            return null;
        }

        $endDate = $this->isFrozen() ? DateTimeHelper::getNowUTC()->add($this->getFrozenAt()->diff($this->getEndDate())) : $this->getEndDate();
        if (!is_null($this->getMaxLimitDate())) {
            $endDate = min($endDate, $this->getMaxLimitDate());
        }

        return $endDate;
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

    public function getTotalDuration(): ?int
    {
        return $this->totalDuration;
    }

    /**
     * @return $this
     */
    public function setTotalDuration(?int $totalDuration): static
    {
        $this->totalDuration = $totalDuration;

        return $this;
    }

    public function isTestLock(): ?bool
    {
        return $this->testLock;
    }

    public function setTestLock(?bool $testLock): self
    {
        $this->testLock = $testLock;

        return $this;
    }

    public function getRole(): ?LockRole
    {
        return $this->role;
    }

    public function setRole(?LockRole $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function isAllowedToViewTime(): ?bool
    {
        return $this->allowedToViewTime;
    }

    /**
     * @return $this
     */
    public function setAllowedToViewTime(?bool $allowedToViewTime): static
    {
        $this->allowedToViewTime = $allowedToViewTime;

        return $this;
    }

    /**
     * Helper that checks both {@see Lock::isAllowedToViewTime} and {@see Lock::getHideTimeLogs}.
     */
    public function canViewTime(): bool
    {
        return ($this->isAllowedToViewTime() ?? false) || !($this->getHideTimeLogs() ?? true);
    }

    public function isLockUnlockable(): ?bool
    {
        return $this->lockUnlockable;
    }

    /**
     * @return $this
     */
    public function setLockUnlockable(?bool $lockUnlockable): static
    {
        $this->lockUnlockable = $lockUnlockable;

        return $this;
    }

    public function isUnlockable(): bool
    {
        return ($this->isLockUnlockable() && $this->getExtensionsAllowUnlocking()) || $this->getCanBeUnlockedByMaxLimitDate();
    }

    public function getCanBeUnlockedByMaxLimitDate(): ?bool
    {
        return $this->canBeUnlockedByMaxLimitDate;
    }

    /**
     * @return $this
     */
    public function setCanBeUnlockedByMaxLimitDate(?bool $canBeUnlockedByMaxLimitDate): static
    {
        $this->canBeUnlockedByMaxLimitDate = $canBeUnlockedByMaxLimitDate;

        return $this;
    }

    /**
     * @return ExtensionHomeActionWithPartyId[]
     */
    public function getAvailableHomeActions(): array
    {
        return $this->availableHomeActions;
    }

    /**
     * @param ExtensionHomeActionWithPartyId[] $availableHomeActions
     *
     * @return $this
     */
    public function setAvailableHomeActions(array $availableHomeActions): static
    {
        $this->availableHomeActions = $availableHomeActions;

        return $this;
    }

    public function hasAvailableHomeAction(HomeAction|string $slug): bool
    {
        $slug = HomeAction::tryNormalizeToValue($slug) ?? $slug;
        if (empty($this->getAvailableHomeActions())) {
            return false;
        }

        return !empty(Arr::first($this->getAvailableHomeActions(), function (ExtensionHomeActionWithPartyId $r) use ($slug) {
            return $r->getSlug() === $slug;
        }));
    }

    public function hasReasonPreventingUnlocking(ReasonPreventingUnlock $reason): bool
    {
        if (empty($this->getReasonsPreventingUnlocking())) {
            return false;
        }

        return !empty(Arr::first($this->getReasonsPreventingUnlocking(), function (ReasonPreventingUnlocking $r) use ($reason) {
            $value = $r->getReasonEnum();
            if (!($value instanceof ReasonPreventingUnlock)) {
                return false;
            }

            return $reason->equals($value);
        }));
    }

    /**
     * @return ReasonPreventingUnlocking[]
     */
    public function getReasonsPreventingUnlocking(): array
    {
        return $this->reasonsPreventingUnlocking;
    }

    public function getReasonsPreventingUnlockingString(): array
    {
        $reasonsPreventingUnlocking = $this->getReasonsPreventingUnlocking();

        return array_map(function ($value) {
            return $value->getReason();
        }, $reasonsPreventingUnlocking);
    }

    /**
     * @param ReasonPreventingUnlocking[] $reasonsPreventingUnlocking
     *
     * @return $this
     */
    public function setReasonsPreventingUnlocking(array $reasonsPreventingUnlocking): static
    {
        $this->reasonsPreventingUnlocking = $reasonsPreventingUnlocking;

        return $this;
    }

    public function getExtensionsAllowUnlocking(): ?bool
    {
        return $this->extensionsAllowUnlocking;
    }

    public function setExtensionsAllowUnlocking(?bool $extensionsAllowUnlocking): static
    {
        $this->extensionsAllowUnlocking = $extensionsAllowUnlocking;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    /**
     * @return $this
     */
    public function setUpdatedAt(?DateTimeInterface $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @return $this
     */
    public function setStartDate(?DateTimeInterface $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getMinDate(): ?DateTimeInterface
    {
        return $this->minDate;
    }

    /**
     * @return $this
     */
    public function setMinDate(?DateTimeInterface $minDate): static
    {
        $this->minDate = $minDate;

        return $this;
    }

    public function getMaxDate(): ?DateTimeInterface
    {
        return $this->maxDate;
    }

    /**
     * @return $this
     */
    public function setMaxDate(?DateTimeInterface $maxDate): static
    {
        $this->maxDate = $maxDate;

        return $this;
    }

    public function getDisplayRemainingTime(): ?bool
    {
        return $this->displayRemainingTime;
    }

    /**
     * @return $this
     */
    public function setDisplayRemainingTime(?bool $displayRemainingTime): static
    {
        $this->displayRemainingTime = $displayRemainingTime;

        return $this;
    }

    /**
     * Helper for getLimitLockTime().
     *
     * @see Lock::getLimitLockTime
     */
    public function isLockTimeLimited(): ?bool
    {
        return $this->getLimitLockTime();
    }

    public function getLimitLockTime(): ?bool
    {
        return $this->limitLockTime;
    }

    /**
     * @return $this
     */
    public function setLimitLockTime(?bool $limitLockTime): static
    {
        $this->limitLockTime = $limitLockTime;

        return $this;
    }

    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->deletedAt;
    }

    /**
     * @return $this
     */
    public function setDeletedAt(?DateTimeInterface $deletedAt): static
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    public function getUnlockedAt(): ?DateTimeInterface
    {
        return $this->unlockedAt;
    }

    /**
     * @return $this
     */
    public function setUnlockedAt(?DateTimeInterface $unlockedAt): static
    {
        $this->unlockedAt = $unlockedAt;

        return $this;
    }

    public function getArchivedAt(): ?DateTimeInterface
    {
        return $this->archivedAt;
    }

    /**
     * @return $this
     */
    public function setArchivedAt(?DateTimeInterface $archivedAt): static
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    public function getFrozenAtToNowHours(?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getFrozenAtToNowInterval($now);
        if (is_null($interval)) {
            return null;
        }

        return ComparableDateInterval::getTotalHours($interval, $roundingFunc);
    }

    public function getFrozenAtToNowInterval(?DateTimeInterface $now = null): ?DateInterval
    {
        if ($this->isFrozen() && !empty($this->getFrozenAt())) {
            if (empty($now)) {
                $now = new DateTime();
                $now->setTimezone(new DateTimeZone('UTC'));
            }

            return $this->getFrozenAt()->diff($now);
        }

        return null;
    }

    public function isFrozen(): ?bool
    {
        return $this->frozen;
    }

    /**
     * @return $this
     */
    public function setFrozen(?bool $frozen): static
    {
        $this->frozen = $frozen;

        return $this;
    }

    public function getFrozenAt(): ?DateTimeInterface
    {
        return $this->frozenAt;
    }

    /**
     * @return $this
     */
    public function setFrozenAt(?DateTimeInterface $frozenAt): static
    {
        $this->frozenAt = $frozenAt;

        return $this;
    }

    public function getKeyholderArchivedAt(): ?DateTimeInterface
    {
        return $this->keyholderArchivedAt;
    }

    /**
     * @return $this
     */
    public function setKeyholderArchivedAt(?DateTimeInterface $keyholderArchivedAt): static
    {
        $this->keyholderArchivedAt = $keyholderArchivedAt;

        return $this;
    }

    public function hasKeyholderArchived(): bool
    {
        return !is_null($this->getKeyholderArchivedAt());
    }

    public function getHideTimeLogs(): ?bool
    {
        return $this->hideTimeLogs;
    }

    /**
     * @return $this
     */
    public function setHideTimeLogs(?bool $hideTimeLogs): static
    {
        $this->hideTimeLogs = $hideTimeLogs;

        return $this;
    }

    public function isTrusted(): ?bool
    {
        return $this->trusted;
    }

    /**
     * @return $this
     */
    public function setTrusted(?bool $trusted): static
    {
        $this->trusted = $trusted;

        return $this;
    }

    /**
     * @return ExtensionParty[]|null
     */
    public function getExtensions(): ?array
    {
        return $this->extensions;
    }

    /**
     * @param ExtensionParty[]|null $extensions
     *
     * @return $this
     */
    public function setExtensions(?array $extensions): static
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function __call(string $name, array $arguments)
    {
        $n = u($name);
        if ($n->equalsTo('hasAnyGame')) {
            return $this->hasExtension(ChasterExtension::DICE) || $this->hasExtension(ChasterExtension::WHEEL_OF_FORTUNE);
        }

        if ($n->startsWith(['get', 'has'])) {
            $var = $n->snake()->after('get_')->after('has_')->replace('_', '-')->toString();
            if ($n->startsWith('has')) {
                return $this->hasExtension($var);
            }

            $return = Arr::first($this->extensions, function ($v) use ($var) {
                return $v->getSlug() === $var;
            });
            if ($n->startsWith('has')) {
                return !empty($return);
            } else {
                return $return;
            }
        }
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @see https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString(): string
    {
        return $this->getTitle() ?? $this->getId() ?? '';
    }

    /**
     * @example Lock Name [Lock ID]
     */
    public function getFormattedName(bool $masked = false): string
    {
        return sprintf('%s [%s]', $this->getTitle() ?? '', $masked ? StringMaskRuntime::getMaskedString($this->getId()) : $this->getId());
    }

    public function hasExtension(ChasterExtension|string $extension): bool
    {
        $extension = ChasterExtension::normalizeToEnum($extension);

        return !empty(Arr::first($this->extensions, function ($v) use ($extension) {
            return $v->getSlug() === $extension->value;
        }));
    }

    public function getExtension(ChasterExtension|string $slug): ?ExtensionParty
    {
        $slug = ChasterExtension::normalizeToValue($slug);

        return Arr::first($this->extensions, function ($v) use ($slug) {
            return $v->getSlug() === $slug;
        });
    }

    public function isUserKeyholder(User|string $user): bool
    {
        if ($user instanceof User) {
            $user = $user->getId();
        }

        return $this->getKeyholder()?->getId() === $user;
    }

    public function hasKeyholder(): bool
    {
        return !empty($this->keyholder);
    }

    public function getKeyholder(): ?User
    {
        return $this->keyholder;
    }

    /**
     * @return $this
     */
    public function setKeyholder(?User $keyholder): static
    {
        $this->keyholder = $keyholder;

        return $this;
    }

    public function getKeyholderUnavailable(): ?KeyholderUnavailable
    {
        return $this->keyholderUnavailable;
    }

    public function setKeyholderUnavailable(KeyholderUnavailable|string|null $keyholderUnavailable): static
    {
        $this->keyholderUnavailable = !is_null($keyholderUnavailable) ? KeyholderUnavailable::tryNormalizeToEnum($keyholderUnavailable) : null;

        return $this;
    }

    public function isUserWearer(User|string $user): bool
    {
        if ($user instanceof User) {
            $user = $user->getId();
        }

        return $this->getUser()?->getId() === $user;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @return $this
     */
    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getNowToLesserOfMaxOrEndPercentageInterval(float $percentage, ?DateTimeInterface $now = null): ?DateInterval
    {
        $remaining = $this->getNowToLesserOfMaxOrEndInterval(now: $now);
        if (is_null($remaining)) {
            return null;
        }

        return LargeComparableDateInterval::normalizeToDateInterval(round(LargeComparableDateInterval::normalizeToSeconds($remaining) * $percentage));
    }

    public function isUnlockedForHygiene(): bool
    {
        return $this->hasReasonPreventingUnlocking(ReasonPreventingUnlock::TEMPORARY_OPENING);
    }

    public function isTaskAssigned(): bool
    {
        if (!$this->hasTasks()) {
            return false;
        }

        return $this->hasAvailableHomeAction(HomeAction::TASKS_DO_TASK);
    }
}
