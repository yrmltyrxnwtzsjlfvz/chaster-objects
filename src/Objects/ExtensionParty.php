<?php

namespace Fake\ChasterObjects\Objects;

use DateTimeInterface;
use Fake\ChasterObjects\Objects\Extension\Task\ExtensionTasks;
use Fake\ChasterObjects\Objects\Extension\VerificationPicture\ExtensionVerificationPicture;
use Fake\ChasterObjects\Objects\Traits\ExtensionTrait;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;
use Symfony\Component\Serializer\Annotation\SerializedName;

#[DiscriminatorMap(typeProperty: 'slug', mapping: [
    'tasks' => ExtensionTasks::class,
    'verification-picture' => ExtensionVerificationPicture::class,
    '2048' => ExtensionParty::class,
    'ad' => ExtensionParty::class,
    'add' => ExtensionParty::class,
    'add-random' => ExtensionParty::class,
    'add-time' => ExtensionParty::class,
    'advanced-wheel' => ExtensionParty::class,
    'advanced-wof' => ExtensionParty::class,
    'aetherial-gaol' => ExtensionParty::class,
    'ai-extension' => ExtensionParty::class,
    'ai-take-over' => ExtensionParty::class,
    'alfred' => ExtensionParty::class,
    'alfred-1' => ExtensionParty::class,
    'allies-extension' => ExtensionParty::class,
    'appext' => ExtensionParty::class,
    'asd' => ExtensionParty::class,
    'bathroom-break' => ExtensionParty::class,
    'better-dice' => ExtensionParty::class,
    'better-random-events' => ExtensionParty::class,
    'blackjack' => ExtensionParty::class,
    'black-jack' => ExtensionParty::class,
    'blackjack-1' => ExtensionParty::class,
    'blackjack-2' => ExtensionParty::class,
    'blackjack-3' => ExtensionParty::class,
    'body-writing' => ExtensionParty::class,
    'bot-fun' => ExtensionParty::class,
    'bracket-challenge' => ExtensionParty::class,
    'cards' => ExtensionParty::class,
    'cards-1' => ExtensionParty::class,
    'cardtest' => ExtensionParty::class,
    'ccc' => ExtensionParty::class,
    'censored-rewards' => ExtensionParty::class,
    'challenge-queue' => ExtensionParty::class,
    'chance' => ExtensionParty::class,
    'chastefooterbar' => ExtensionParty::class,
    'chastergames' => ExtensionParty::class,
    'chastershock' => ExtensionParty::class,
    'chastipelago' => ExtensionParty::class,
    'chastityvalleyapi' => ExtensionParty::class,
    'checkin' => ExtensionParty::class,
    'chores' => ExtensionParty::class,
    'chores-1' => ExtensionParty::class,
    'control-panel' => ExtensionParty::class,
    'creative-tasks' => ExtensionParty::class,
    'customsafe' => ExtensionParty::class,
    'cypheris' => ExtensionParty::class,
    'decisions' => ExtensionParty::class,
    'deepthroattrainer' => ExtensionParty::class,
    'demerzel' => ExtensionParty::class,
    'dice' => ExtensionParty::class,
    'dice-and-denial' => ExtensionParty::class,
    'dice-and-denial-localdev' => ExtensionParty::class,
    'dice-game' => ExtensionParty::class,
    'dice-roll' => ExtensionParty::class,
    'dynamic-wheel-of-fortune' => ExtensionParty::class,
    'edge' => ExtensionParty::class,
    'evalennes-extension' => ExtensionParty::class,
    'extended-chat-logs' => ExtensionParty::class,
    'extended-wheel-of-fortune' => ExtensionParty::class,
    'extension-01' => ExtensionParty::class,
    'extest' => ExtensionParty::class,
    'fifteen-devel' => ExtensionParty::class,
    'find-the-key' => ExtensionParty::class,
    'find-the-key-1' => ExtensionParty::class,
    'find-the-key-devel' => ExtensionParty::class,
    'find-the-needle-in-the-haystack' => ExtensionParty::class,
    'first-test' => ExtensionParty::class,
    'firsttry' => ExtensionParty::class,
    'foo-man-chew' => ExtensionParty::class,
    'forced-voyeur' => ExtensionParty::class,
    'forced-watch' => ExtensionParty::class,
    'forced-watch-1' => ExtensionParty::class,
    'freeze-tag' => ExtensionParty::class,
    'game' => ExtensionParty::class,
    'geo-lock' => ExtensionParty::class,
    'guess-the-number' => ExtensionParty::class,
    'guess-timer' => ExtensionParty::class,
    'handmanlocalhostapp' => ExtensionParty::class,
    'hangman' => ExtensionParty::class,
    'hello' => ExtensionParty::class,
    'hello-world' => ExtensionParty::class,
    'hellscape' => ExtensionParty::class,
    'himetaskcontroller' => ExtensionParty::class,
    'hwj' => ExtensionParty::class,
    'improvement' => ExtensionParty::class,
    'increase-max-time' => ExtensionParty::class,
    'jigsaw-puzzle' => ExtensionParty::class,
    'jigsaw-puzzle-dev' => ExtensionParty::class,
    'jigsaw-puzzles' => ExtensionParty::class,
    'jigsaw-puzzle-test' => ExtensionParty::class,
    'jorgenbot' => ExtensionParty::class,
    'just-the-pillory' => ExtensionParty::class,
    'keptfit' => ExtensionParty::class,
    'keyara' => ExtensionParty::class,
    'keyholder' => ExtensionParty::class,
    'key-hunt' => ExtensionParty::class,
    'kittenlockstest' => ExtensionParty::class,
    'kukareka-test-extension' => ExtensionParty::class,
    'learning' => ExtensionParty::class,
    'life-control' => ExtensionParty::class,
    'link' => ExtensionParty::class,
    'linked-locks' => ExtensionParty::class,
    'lo' => ExtensionParty::class,
    'lockbox' => ExtensionParty::class,
    'locked-games' => ExtensionParty::class,
    'locked-together' => ExtensionParty::class,
    'lock-one' => ExtensionParty::class,
    'locktober' => ExtensionParty::class,
    'locktober-points' => ExtensionParty::class,
    'locky2' => ExtensionParty::class,
    'lol' => ExtensionParty::class,
    'lucky-case' => ExtensionParty::class,
    'maple' => ExtensionParty::class,
    'marina-extension' => ExtensionParty::class,
    'mathematical-challenges' => ExtensionParty::class,
    'md' => ExtensionParty::class,
    'meltibelti' => ExtensionParty::class,
    'memory' => ExtensionParty::class,
    'minecraft' => ExtensionParty::class,
    'mods' => ExtensionParty::class,
    'moreorless' => ExtensionParty::class,
    'multi-lock' => ExtensionParty::class,
    'multiple-choice-4-timer' => ExtensionParty::class,
    'obedience' => ExtensionParty::class,
    'obedience-1' => ExtensionParty::class,
    'obedience-shop-rewards' => ExtensionParty::class,
    'obedience-stage' => ExtensionParty::class,
    'ocr' => ExtensionParty::class,
    'open' => ExtensionParty::class,
    'padlock' => ExtensionParty::class,
    'paypal-verification' => ExtensionParty::class,
    'penalty' => ExtensionParty::class,
    'permalocked' => ExtensionParty::class,
    'permalocked-1' => ExtensionParty::class,
    'pillory' => ExtensionParty::class,
    'pillory-play' => ExtensionParty::class,
    'pleasurechore' => ExtensionParty::class,
    'programmable-lock' => ExtensionParty::class,
    'programmable-lock-dev' => ExtensionParty::class,
    'programmable-lock-test' => ExtensionParty::class,
    'quiz' => ExtensionParty::class,
    'quiz-1' => ExtensionParty::class,
    'qustodio' => ExtensionParty::class,
    'qustodio-dev' => ExtensionParty::class,
    'random' => ExtensionParty::class,
    'random-1' => ExtensionParty::class,
    'random-events' => ExtensionParty::class,
    'random-events-1' => ExtensionParty::class,
    'random-events-2' => ExtensionParty::class,
    'random-events-3' => ExtensionParty::class,
    'randomizerextension' => ExtensionParty::class,
    'rating-system' => ExtensionParty::class,
    'reading' => ExtensionParty::class,
    'rewarding-tasklist' => ExtensionParty::class,
    'roulette' => ExtensionParty::class,
    'scavenger-codes' => ExtensionParty::class,
    'schoolsos' => ExtensionParty::class,
    'secondlife-sync' => ExtensionParty::class,
    'seraphina' => ExtensionParty::class,
    'shop' => ExtensionParty::class,
    'sillytavernintegrationtest' => ExtensionParty::class,
    'skaldiks-tasks' => ExtensionParty::class,
    'spend-task-points' => ExtensionParty::class,
    'spin' => ExtensionParty::class,
    'spins' => ExtensionParty::class,
    'stardash-connect' => ExtensionParty::class,
    'stardew' => ExtensionParty::class,
    'stephanieparker1' => ExtensionParty::class,
    'steps' => ExtensionParty::class,
    'strava' => ExtensionParty::class,
    'strawberria-penalties' => ExtensionParty::class,
    'sudoku' => ExtensionParty::class,
    'sudoku-game' => ExtensionParty::class,
    'task-master' => ExtensionParty::class,
    'tasks-for-productivity' => ExtensionParty::class,
    'tattletale' => ExtensionParty::class,
    'tattletale-dev' => ExtensionParty::class,
    'temporary-opening' => ExtensionParty::class,
    'tesex' => ExtensionParty::class,
    'test' => ExtensionParty::class,
    'test1' => ExtensionParty::class,
    'test-1' => ExtensionParty::class,
    'test-10' => ExtensionParty::class,
    'test1-1' => ExtensionParty::class,
    'test-11' => ExtensionParty::class,
    'test-1-1' => ExtensionParty::class,
    'test-12' => ExtensionParty::class,
    'test-13' => ExtensionParty::class,
    'test-14' => ExtensionParty::class,
    'test-15' => ExtensionParty::class,
    'test-16' => ExtensionParty::class,
    'test-17' => ExtensionParty::class,
    'test-18' => ExtensionParty::class,
    'test-19' => ExtensionParty::class,
    'test2' => ExtensionParty::class,
    'test-2' => ExtensionParty::class,
    'test-20' => ExtensionParty::class,
    'test2-1' => ExtensionParty::class,
    'test-21' => ExtensionParty::class,
    'test-22' => ExtensionParty::class,
    'test-23' => ExtensionParty::class,
    'test-24' => ExtensionParty::class,
    'test-25' => ExtensionParty::class,
    'test-26' => ExtensionParty::class,
    'test-27' => ExtensionParty::class,
    'test-28' => ExtensionParty::class,
    'test-29' => ExtensionParty::class,
    'test-3' => ExtensionParty::class,
    'test-30' => ExtensionParty::class,
    'test-31' => ExtensionParty::class,
    'test-32' => ExtensionParty::class,
    'test-33' => ExtensionParty::class,
    'test-34' => ExtensionParty::class,
    'test-35' => ExtensionParty::class,
    'test-36' => ExtensionParty::class,
    'test-37' => ExtensionParty::class,
    'test-38' => ExtensionParty::class,
    'test-39' => ExtensionParty::class,
    'test-4' => ExtensionParty::class,
    'test-5' => ExtensionParty::class,
    'test-6' => ExtensionParty::class,
    'test-7' => ExtensionParty::class,
    'test-8' => ExtensionParty::class,
    'test-9' => ExtensionParty::class,
    'testa' => ExtensionParty::class,
    'teste' => ExtensionParty::class,
    'testension' => ExtensionParty::class,
    'testext' => ExtensionParty::class,
    'test-ext' => ExtensionParty::class,
    'test-ext-1' => ExtensionParty::class,
    'testextension' => ExtensionParty::class,
    'test-extension' => ExtensionParty::class,
    'testextension-1' => ExtensionParty::class,
    'test-extension-1' => ExtensionParty::class,
    'testextension-2' => ExtensionParty::class,
    'test-extension-2' => ExtensionParty::class,
    'test-extension-2230' => ExtensionParty::class,
    'test-extension-3' => ExtensionParty::class,
    'test-extension-4' => ExtensionParty::class,
    'test-extension-5' => ExtensionParty::class,
    'test-extension-6' => ExtensionParty::class,
    'test-extension-7' => ExtensionParty::class,
    'test-extension-enderaxis' => ExtensionParty::class,
    'test-extention' => ExtensionParty::class,
    'testify' => ExtensionParty::class,
    'test-mobile' => ExtensionParty::class,
    'text-extension' => ExtensionParty::class,
    'the-old-cards-game' => ExtensionParty::class,
    'the-test' => ExtensionParty::class,
    'time-from-caption' => ExtensionParty::class,
    'timer' => ExtensionParty::class,
    'timeshift' => ExtensionParty::class,
    'trap' => ExtensionParty::class,
    'trivia' => ExtensionParty::class,
    'trivia-1' => ExtensionParty::class,
    'trst' => ExtensionParty::class,
    'ttlock' => ExtensionParty::class,
    'ttlock-1' => ExtensionParty::class,
    'ttlock-2' => ExtensionParty::class,
    'typing-tasks' => ExtensionParty::class,
    'unfreeze' => ExtensionParty::class,
    'unlock' => ExtensionParty::class,
    'unlock-condition' => ExtensionParty::class,
    'unlock-condition-dev' => ExtensionParty::class,
    'vincebot' => ExtensionParty::class,
    'voting' => ExtensionParty::class,
    'voting-games' => ExtensionParty::class,
    'webhook-1' => ExtensionParty::class,
    'webhooks-alpha' => ExtensionParty::class,
    'weighted-dice' => ExtensionParty::class,
    'weighted-wheel-of-fortune' => ExtensionParty::class,
    'wheel-of-fortune' => ExtensionParty::class,
    'wheel-of-fortune-1' => ExtensionParty::class,
    'wordle' => ExtensionParty::class,
    'wordle-1' => ExtensionParty::class,
    'wordle-dev' => ExtensionParty::class,
    'wordle-test' => ExtensionParty::class,
    'writeforme' => ExtensionParty::class,
    'yo' => ExtensionParty::class,
    '-key-hunt' => ExtensionParty::class,
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
