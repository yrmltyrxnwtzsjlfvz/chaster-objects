<?php

namespace Fake\ChasterObjects\Objects\Lock;

use DateTimeInterface;
use Fake\ChasterObjects\Enums\SharedLockDurationMode;
use Fake\ChasterObjects\Objects\Extension\Extension;
use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;
use Fake\ChasterObjects\Objects\Traits\ChasterIdTrait;
use Fake\ChasterObjects\Objects\Traits\LockIdNormalizerTrait;
use SensitiveParameter;
use Symfony\Component\Serializer\Annotation\SerializedName;
use Symfony\Component\Validator\Constraints as Assert;

class SharedLock implements LockSessionInterface
{
    use ChasterIdTrait;
    use LockIdNormalizerTrait;

    /**
     * @var int|null
     */
    private $minDuration;

    /**
     * @var int|null
     */
    private $maxDuration;

    /**
     * @var int|null
     */
    private $maxLimitDuration;

    /**
     * @var DateTimeInterface|null
     */
    private $minDate;

    /**
     * @var DateTimeInterface|null
     */
    private $maxDate;

    /**
     * @var DateTimeInterface|null
     */
    private $maxLimitDate;

    /**
     * @var bool|null
     */
    private $displayRemainingTime;

    /**
     * @var bool|null
     */
    private $limitLockTime;

    /**
     * @var int|null
     */
    private $maxLockedUsers;

    /**
     * @var bool|null
     */
    #[SerializedName('isPublic')]
    private $publicLock;

    /**
     * @var bool|null
     */
    private $requireContact;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $description;

    /**
     * @var UnsplashPhoto|null
     */
    private $unsplashPhoto;

    /**
     * @var bool|null
     */
    private $hideTimeLogs;

    /**
     * @var DateTimeInterface|null
     */
    private $lastSavedAt;

    /**
     * @var bool|null
     */
    private $requirePassword;

    #[Assert\NotBlank]
    private ?string $password = null;

    /**
     * @var string|null
     */
    private ?SharedLockDurationMode $durationMode = SharedLockDurationMode::DURATION;

    /**
     * @var int|null
     */
    private $calculatedMaxLimitDuration;

    /**
     * @var Extension[]
     */
    private $extensions = [];

    /**
     * @var string[]
     */
    private array $tags = [];

    #[SerializedName('isFindom')]
    private ?bool $findom = null;

    public function getMinDuration(): ?int
    {
        return $this->minDuration;
    }

    /**
     * @return $this
     */
    public function setMinDuration(?int $minDuration): static
    {
        $this->minDuration = $minDuration;

        return $this;
    }

    public function getMaxDuration(): ?int
    {
        return $this->maxDuration;
    }

    /**
     * @return $this
     */
    public function setMaxDuration(?int $maxDuration): static
    {
        $this->maxDuration = $maxDuration;

        return $this;
    }

    public function getMaxLimitDuration(): ?int
    {
        return $this->maxLimitDuration;
    }

    /**
     * @return $this
     */
    public function setMaxLimitDuration(?int $maxLimitDuration): static
    {
        $this->maxLimitDuration = $maxLimitDuration;

        return $this;
    }

    public function clearDurations(): static
    {
        return $this->setMinDuration(1)
            ->setMaxDuration(1)
            ->setMaxLimitDuration(null);
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

    public function getMaxLimitDate(): ?DateTimeInterface
    {
        return $this->maxLimitDate;
    }

    /**
     * @return $this
     */
    public function setMaxLimitDate(?DateTimeInterface $maxLimitDate): static
    {
        $this->maxLimitDate = $maxLimitDate;

        return $this;
    }

    public function clearDates(): static
    {
        return $this->setMinDate(null)
            ->setMaxDate(null)
            ->setMaxLimitDate(null);
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
     * Helper that checks both {@see SharedLock::getDisplayRemainingTime} and {@see SharedLock::getHideTimeLogs}.
     */
    public function canViewTime(): bool
    {
        return ($this->getDisplayRemainingTime() ?? false) || !($this->getHideTimeLogs() ?? true);
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

    public function getMaxLockedUsers(): ?int
    {
        return $this->maxLockedUsers;
    }

    /**
     * @return $this
     */
    public function setMaxLockedUsers(?int $maxLockedUsers): static
    {
        $this->maxLockedUsers = $maxLockedUsers;

        return $this;
    }

    public function isPublicLock(): ?bool
    {
        return $this->publicLock;
    }

    /**
     * @return $this
     */
    public function setPublicLock(?bool $publicLock): static
    {
        $this->publicLock = $publicLock;

        return $this;
    }

    public function getRequireContact(): ?bool
    {
        return $this->requireContact;
    }

    /**
     * @return $this
     */
    public function setRequireContact(?bool $requireContact): static
    {
        $this->requireContact = $requireContact;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return $this
     */
    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getUnsplashPhoto(): ?UnsplashPhoto
    {
        return $this->unsplashPhoto;
    }

    /**
     * @return $this
     */
    public function setUnsplashPhoto(?UnsplashPhoto $unsplashPhoto): static
    {
        $this->unsplashPhoto = $unsplashPhoto;

        return $this;
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

    public function getLastSavedAt(): ?DateTimeInterface
    {
        return $this->lastSavedAt;
    }

    /**
     * @return $this
     */
    public function setLastSavedAt(?DateTimeInterface $lastSavedAt): static
    {
        $this->lastSavedAt = $lastSavedAt;

        return $this;
    }

    public function getRequirePassword(): ?bool
    {
        return $this->requirePassword;
    }

    /**
     * @return $this
     */
    public function setRequirePassword(?bool $requirePassword): static
    {
        $this->requirePassword = $requirePassword;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     *
     * @return $this
     */
    public function setPassword(#[SensitiveParameter] ?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Helper method that sets the password and requirePassword fields.
     *
     * @param string|null $password
     *
     * @return $this
     */
    public function setPasswordRequired(#[SensitiveParameter] ?string $password = null): static
    {
        return $this->setPassword($password)
            ->setRequirePassword(!empty($password));
    }

    public function getDurationMode(): ?SharedLockDurationMode
    {
        return $this->durationMode;
    }

    /**
     * @return $this
     */
    public function setDurationMode(SharedLockDurationMode|string|null $durationMode): static
    {
        $this->durationMode = !is_null($durationMode) ? SharedLockDurationMode::normalizeToEnum($durationMode) : null;

        return $this;
    }

    /**
     * Helper function that sets the correct duration mode dependant on the min/max date fields
     * @return $this
     */
    public function setupDurationMode(): static
    {
        return $this->setDurationMode((!is_null($this->getMinDate()) && !is_null($this->getMaxDate())) ? SharedLockDurationMode::DATE : SharedLockDurationMode::DURATION);
    }

    public function getCalculatedMaxLimitDuration(): ?int
    {
        return $this->calculatedMaxLimitDuration;
    }

    /**
     * @return $this
     */
    public function setCalculatedMaxLimitDuration(?int $calculatedMaxLimitDuration): static
    {
        $this->calculatedMaxLimitDuration = $calculatedMaxLimitDuration;

        return $this;
    }

    public function getPublicLink(): string
    {
        return sprintf('https://chaster.app/explore/%s', $this->getId());
    }

    /**
     * The __toString method allows a class to decide how it will react when it is converted to a string.
     *
     * @see https://php.net/manual/en/language.oop5.magic.php#language.oop5.magic.tostring
     */
    public function __toString(): string
    {
        return $this->getName() ?? $this->getId() ?? '';
    }

    /**
     * @return Extension[]
     */
    public function getExtensions(): array
    {
        return $this->extensions;
    }

    /**
     * @param Extension[] $extensions
     *
     * @return $this
     */
    public function setExtensions(array $extensions): self
    {
        $this->extensions = $extensions;

        return $this;
    }

    /**
     * @return string[]
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * @return $this
     */
    public function setTags(array $tags): self
    {
        $this->tags = $tags;

        return $this;
    }

    public function isFindom(): ?bool
    {
        return $this->findom;
    }

    /**
     * @return $this
     */
    public function setFindom(?bool $findom): self
    {
        $this->findom = $findom;

        return $this;
    }
}
