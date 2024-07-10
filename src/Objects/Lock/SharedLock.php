<?php

namespace Fake\ChasterObjects\Objects\Lock;

use DateTimeInterface;
use Fake\ChasterObjects\Objects\Extension\Extension;
use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;
use Fake\ChasterObjects\Objects\Traits\ChasterIdTrait;
use Fake\ChasterObjects\Objects\Traits\LockIdNormalizerTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

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

    /**
     * @var string|null
     */
    private $durationMode;

    /**
     * @var int|null
     */
    private $calculatedMaxLimitDuration;

    /**
     * @var Extension[]
     */
    private $extensions = [];

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

    public function getDurationMode(): ?string
    {
        return $this->durationMode;
    }

    /**
     * @return $this
     */
    public function setDurationMode(?string $durationMode): static
    {
        $this->durationMode = $durationMode;

        return $this;
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
}
