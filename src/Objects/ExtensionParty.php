<?php

namespace Fake\ChasterObjects\Objects;

use DateTimeInterface;
use Fake\ChasterObjects\Objects\Extension\Task\ExtensionTasks;
use Fake\ChasterObjects\Objects\Extension\TemporaryOpening\ExtensionTemporaryOpening;
use Fake\ChasterObjects\Objects\Extension\VerificationPicture\ExtensionVerificationPicture;
use Fake\ChasterObjects\Objects\Traits\ExtensionTrait;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[DiscriminatorMap(typeProperty: 'slug', mapping: [
    'tasks' => ExtensionTasks::class,
    'temporary-opening' => ExtensionTemporaryOpening::class,
    'verification-picture' => ExtensionVerificationPicture::class,
    'better-dice' => Extension\Partner\BetterDice\Extension::class,
    'better-random-events' => Extension\Partner\BetterRandomEvents\Extension::class,
    'dice' => Extension\Dice\Extension::class,
    'find-the-key-1' => Extension\Partner\FindTheKey1\Extension::class,
    'games' => Extension\Partner\Games\Extension::class,
    'guess-timer' => Extension\GuessTimer\Extension::class,
    'jigsaw-puzzle' => Extension\Partner\JigsawPuzzle\Extension::class,
    'link' => Extension\Link\Extension::class,
    'penalty' => Extension\Penalty\Extension::class,
    'pillory' => Extension\Pillory\Extension::class,
    'programmable-lock' => Extension\Partner\ProgrammableLock\Extension::class,
    'random-events' => Extension\RandomEvents\Extension::class,
    'unlock-condition' => Extension\Partner\UnlockCondition\Extension::class,
    'wheel-of-fortune' => Extension\WheelOfFortune\Extension::class,
    'wordle' => Extension\Partner\Wordle\Extension::class,
])]
class ExtensionParty
{
    use ExtensionTrait;

    /**
     * @var string|null
     */
    #[SerializedName('_id')]
    private $extensionPartyId;

    /**
     * @var string|null
     */
    private $displayName;

    /**
     * @var string|null
     */
    private $summary;

    /**
     * @var string|null
     */
    private $subtitle;

    /**
     * @var string|null
     */
    private $icon;

    /**
     * @var int|null
     */
    private $nbActionsRemaining;

    /**
     * @var DateTimeInterface|null
     */
    private $nextActionDate;

    /**
     * @var DateTimeInterface|null
     */
    private $createdAt;

    /**
     * @var DateTimeInterface|null
     */
    private $updatedAt;

    private $config;

    private $userData;

    public function getExtensionPartyId(): ?string
    {
        return $this->extensionPartyId;
    }

    /**
     * @return $this
     */
    public function setExtensionPartyId(?string $extensionPartyId): static
    {
        $this->extensionPartyId = $extensionPartyId;

        return $this;
    }

    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @return $this
     */
    public function setDisplayName(?string $displayName): static
    {
        $this->displayName = $displayName;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    /**
     * @return $this
     */
    public function setSummary(?string $summary): static
    {
        $this->summary = $summary;

        return $this;
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    /**
     * @return $this
     */
    public function setSubtitle(?string $subtitle): static
    {
        $this->subtitle = $subtitle;

        return $this;
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

    public function getNbActionsRemaining(): ?int
    {
        return $this->nbActionsRemaining;
    }

    /**
     * @return $this
     */
    public function setNbActionsRemaining(?int $nbActionsRemaining): static
    {
        $this->nbActionsRemaining = $nbActionsRemaining;

        return $this;
    }

    public function getNextActionDate(): ?DateTimeInterface
    {
        return $this->nextActionDate;
    }

    /**
     * @return $this
     */
    public function setNextActionDate(?DateTimeInterface $nextActionDate): static
    {
        $this->nextActionDate = $nextActionDate;

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

    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @return $this
     */
    public function setConfig($config): static
    {
        $this->config = $config;

        return $this;
    }

    public function getUserData()
    {
        return $this->userData;
    }

    public function setUserData($userData): static
    {
        $this->userData = $userData;

        return $this;
    }
}
