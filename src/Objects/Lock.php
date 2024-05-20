<?php

namespace Fake\ChasterObjects\Objects;

use Bytes\DateBundle\Objects\ComparableDateInterval;
use Bytes\StringMaskBundle\Twig\StringMaskRuntime;
use DateInterval;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Fake\ChasterObjects\Enums\ChasterExtension;
use Fake\ChasterObjects\Enums\ChasterLockStatus;
use Fake\ChasterObjects\Enums\LockRole;
use Fake\ChasterObjects\Enums\ReasonPreventingUnlock;
use Fake\ChasterObjects\Objects\Interfaces\FormattedNameInterface;
use Fake\ChasterObjects\Objects\Interfaces\LockInterface;
use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;
use Fake\ChasterObjects\Objects\Lock\ReasonPreventingUnlocking;
use Fake\ChasterObjects\Objects\Lock\SharedLock;
use Fake\ChasterObjects\Objects\Traits\ChasterIdTrait;
use Fake\ChasterObjects\Objects\Traits\CreatedAtTrait;
use Fake\ChasterObjects\Objects\Traits\LockTrait;
use Illuminate\Support\Arr;
use Symfony\Component\Serializer\Annotation\SerializedName;

use function Symfony\Component\String\u;

/**
 * @method ExtensionParty|null getDice()
 * @method ExtensionParty|null getGuessTimer()
 * @method ExtensionParty|null getLink()
 * @method ExtensionParty|null getPenalty()
 * @method ExtensionParty|null getPillory()
 * @method ExtensionParty|null getRandomEvents()
 * @method ExtensionParty|null getTasks()
 * @method ExtensionParty|null getTemporaryOpening()
 * @method ExtensionParty|null getVerificationPicture()
 * @method ExtensionParty|null getWheelOfFortune()
 * @method bool                hasDice()
 * @method bool                hasGuessTimer()
 * @method bool                hasLink()
 * @method bool                hasPenalty()
 * @method bool                hasPillory()
 * @method bool                hasRandomEvents()
 * @method bool                hasTasks()
 * @method bool                hasTemporaryOpening()
 * @method bool                hasVerificationPicture()
 * @method bool                hasWheelOfFortune()
 * @method bool                hasAnyGame()             Returns true if dice or wheel-of-fortune is present
 */
class Lock implements LockInterface, FormattedNameInterface
{
    use ChasterIdTrait;
    use CreatedAtTrait;
    use LockTrait;

    /**
     * @var ChasterLockStatus|null
     */
    private $status;

    /**
     * @var SharedLock|null
     */
    private $sharedLock;

    /**
     * @var DateTimeInterface|null
     */
    private $endDate;

    /**
     * @var string|null
     */
    private $title;

    /**
     * @var int|null
     */
    private $totalDuration;

    #[SerializedName('isTestLock')]
    private ?bool $testLock = null;

    /**
     * @var LockRole|null
     */
    private $role;

    /**
     * @var bool|null
     */
    #[SerializedName('isAllowedToViewTime')]
    private $allowedToViewTime;

    /**
     * @var bool|null
     */
    #[SerializedName('canBeUnlocked')]
    private $lockUnlockable;

    /**
     * @var bool|null
     */
    private $canBeUnlockedByMaxLimitDate;

    /**
     * @var bool|null
     */
    #[SerializedName('isFrozen')]
    private $frozen;

    /**
     * @var ExtensionParty[]|null
     */
    private $extensions = [];

    /**
     * @var ExtensionHomeActionWithPartyId[]
     */
    private $availableHomeActions = [];

    /**
     * @var ReasonPreventingUnlocking[]
     */
    private $reasonsPreventingUnlocking = [];

    /**
     * @var DateTimeInterface|null
     */
    private $updatedAt;

    /**
     * @var DateTimeInterface|null
     */
    private $startDate;

    /**
     * @var DateTimeInterface|null
     */
    private $minDate;

    /**
     * @var DateTimeInterface|null
     */
    private $maxDate;

    /**
     * @var bool|null
     */
    private $displayRemainingTime;

    /**
     * @var bool|null
     */
    private $limitLockTime;

    /**
     * @var DateTimeInterface|null
     */
    private $deletedAt;

    /**
     * @var DateTimeInterface|null
     */
    private $unlockedAt;

    /**
     * @var DateTimeInterface|null
     */
    private $archivedAt;

    /**
     * @var DateTimeInterface|null
     */
    private $frozenAt;

    /**
     * @var DateTimeInterface|null
     */
    private $keyholderArchivedAt;

    /**
     * @var bool|null
     */
    private $hideTimeLogs;

    /**
     * Whether the keyholder is trusted.
     *
     * @var bool|null
     */
    private $trusted;

    /**
     * @var User|null
     */
    private $user;

    /**
     * @var User|null
     */
    private $keyholder;
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
        return /* $this->getCanBeUnlocked() && empty($this->getReasonsPreventingUnlocking())) || */ $this->getCanBeUnlockedByMaxLimitDate();
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

    public static function normalizeToLockId(LockSessionInterface|string $lock): string
    {
        return $lock instanceof LockSessionInterface ? $lock->getId() : $lock;
    }
}
