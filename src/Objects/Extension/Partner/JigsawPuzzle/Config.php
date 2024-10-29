<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\JigsawPuzzle;

use Fake\ChasterObjects\Objects\Extension\Partner\JigsawPuzzle\Config\Actions;
use Fake\ChasterObjects\Objects\Extension\Partner\JigsawPuzzle\Config\Puzzles;

class Config
{
    private ?string $displayMode = null;

    private ?int $pieces = null;

    private ?int $timeLimit = null;

    private ?bool $timeLimitActive = null;

    /**
     * @var Actions[]|null
     */
    private ?array $punishments = [];

    /**
     * @var Actions[]|null
     */
    private ?array $rewards = [];

    private ?bool $freezeWhenAvailable = null;

    private ?bool $preventUnlockingWhenAvailable = null;

    private ?bool $randomOrder = null;

    /**
     * @var Puzzles[]|null
     */
    private ?array $puzzles = [];

    public function getDisplayMode(): ?string
    {
        return $this->displayMode;
    }

    /**
     * @return $this
     */
    public function setDisplayMode(?string $displayMode): static
    {
        $this->displayMode = $displayMode;

        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    /**
     * @return $this
     */
    public function setPieces(?int $pieces): static
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getTimeLimit(): ?int
    {
        return $this->timeLimit;
    }

    /**
     * @return $this
     */
    public function setTimeLimit(?int $timeLimit): static
    {
        $this->timeLimit = $timeLimit;

        return $this;
    }

    public function isTimeLimitActive(): ?bool
    {
        return $this->timeLimitActive;
    }

    /**
     * @return $this
     */
    public function setTimeLimitActive(?bool $timeLimitActive): static
    {
        $this->timeLimitActive = $timeLimitActive;

        return $this;
    }

    /**
     * @return Actions[]|null
     */
    public function getPunishments(): ?array
    {
        return $this->punishments;
    }

    /**
     * @return $this
     */
    public function setPunishments(?array $punishments): static
    {
        $this->punishments = $punishments;

        return $this;
    }

    /**
     * @return Actions[]|null
     */
    public function getRewards(): ?array
    {
        return $this->rewards;
    }

    /**
     * @return $this
     */
    public function setRewards(?array $rewards): static
    {
        $this->rewards = $rewards;

        return $this;
    }

    public function getFreezeWhenAvailable(): ?bool
    {
        return $this->freezeWhenAvailable;
    }

    /**
     * @return $this
     */
    public function setFreezeWhenAvailable(?bool $freezeWhenAvailable): static
    {
        $this->freezeWhenAvailable = $freezeWhenAvailable;

        return $this;
    }

    public function getPreventUnlockingWhenAvailable(): ?bool
    {
        return $this->preventUnlockingWhenAvailable;
    }

    /**
     * @return $this
     */
    public function setPreventUnlockingWhenAvailable(?bool $preventUnlockingWhenAvailable): static
    {
        $this->preventUnlockingWhenAvailable = $preventUnlockingWhenAvailable;

        return $this;
    }

    public function getRandomOrder(): ?bool
    {
        return $this->randomOrder;
    }

    /**
     * @return $this
     */
    public function setRandomOrder(?bool $randomOrder): static
    {
        $this->randomOrder = $randomOrder;

        return $this;
    }

    /**
     * @return Puzzles[]|null
     */
    public function getPuzzles(): ?array
    {
        return $this->puzzles;
    }

    /**
     * @return $this
     */
    public function setPuzzles(?array $puzzles): static
    {
        $this->puzzles = $puzzles;

        return $this;
    }
}
