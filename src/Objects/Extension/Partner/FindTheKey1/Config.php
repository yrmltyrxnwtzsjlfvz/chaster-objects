<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config\OnAction;
use Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config\OnCustom;
use Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config\StartupBlockers;
use Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config\StartupUnfairs;
use Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config\StartupUnfairSettings;

class Config implements ExtensionConfigInterface
{
    private ?int $keyspresented = null;

    private ?string $unfairslevel = null;

    /** @var OnAction[]|null */
    private ?array $onstart = [];

    /** @var OnAction[]|null */
    private ?array $oncorrect = [];

    /** @var OnAction[]|null */
    private ?array $onwrong = [];

    private ?string $textConfig = null;

    private ?bool $unfairsenabled = null;

    private ?bool $showAdvanced = null;

    /** @var StartupBlockers[]|null */
    private ?array $startupBlockers = [];

    /** @var StartupUnfairs[]|null */
    private ?array $startupUnfairs = [];

    private ?StartupUnfairSettings $startupUnfairSettings;

    /** @var OnCustom[]|null */
    private ?array $oncustom = [];

    private ?bool $hideconfig = null;

    public function getKeyspresented(): ?int
    {
        return $this->keyspresented;
    }

    public function getUnfairslevel(): ?string
    {
        return $this->unfairslevel;
    }

    /**
     * @return OnAction[]|null
     */
    public function getOnstart(): ?array
    {
        return $this->onstart;
    }

    /**
     * @return OnAction[]|null
     */
    public function getOncorrect(): ?array
    {
        return $this->oncorrect;
    }

    /**
     * @return OnAction[]|null
     */
    public function getOnwrong(): ?array
    {
        return $this->onwrong;
    }

    public function getTextConfig(): ?string
    {
        return $this->textConfig;
    }

    public function getUnfairsenabled(): ?bool
    {
        return $this->unfairsenabled;
    }

    public function getShowAdvanced(): ?bool
    {
        return $this->showAdvanced;
    }

    /**
     * @return StartupBlockers[]|null
     */
    public function getStartupBlockers(): ?array
    {
        return $this->startupBlockers;
    }

    /**
     * @return StartupUnfairs[]|null
     */
    public function getStartupUnfairs(): ?array
    {
        return $this->startupUnfairs;
    }

    public function getStartupUnfairSettings(): ?StartupUnfairSettings
    {
        return $this->startupUnfairSettings;
    }

    /**
     * @return OnCustom[]|null
     */
    public function getOncustom(): ?array
    {
        return $this->oncustom;
    }

    public function getHideconfig(): ?bool
    {
        return $this->hideconfig;
    }

    /**
     * @return $this
     */
    public function setKeyspresented(?int $keyspresented): static
    {
        $this->keyspresented = $keyspresented;

        return $this;
    }

    /**
     * @return $this
     */
    public function setUnfairslevel(?string $unfairslevel): static
    {
        $this->unfairslevel = $unfairslevel;

        return $this;
    }

    /**
     * @param OnAction[]|null $onstart
     */
    public function setOnstart(?array $onstart): static
    {
        $this->onstart = $onstart;

        return $this;
    }

    /**
     * @param OnAction[]|null $oncorrect
     */
    public function setOncorrect(?array $oncorrect): static
    {
        $this->oncorrect = $oncorrect;

        return $this;
    }

    /**
     * @param OnAction[]|null $onwrong
     */
    public function setOnwrong(?array $onwrong): static
    {
        $this->onwrong = $onwrong;

        return $this;
    }

    /**
     * @return $this
     */
    public function setTextConfig(?string $textConfig): static
    {
        $this->textConfig = $textConfig;

        return $this;
    }

    /**
     * @return $this
     */
    public function setUnfairsenabled(?bool $unfairsenabled): static
    {
        $this->unfairsenabled = $unfairsenabled;

        return $this;
    }

    /**
     * @return $this
     */
    public function setShowAdvanced(?bool $showAdvanced): static
    {
        $this->showAdvanced = $showAdvanced;

        return $this;
    }

    /**
     * @param StartupBlockers[]|null $startupBlockers
     */
    public function setStartupBlockers(?array $startupBlockers): static
    {
        $this->startupBlockers = $startupBlockers;

        return $this;
    }

    /**
     * @param StartupUnfairs[]|null $startupUnfairs
     */
    public function setStartupUnfairs(?array $startupUnfairs): static
    {
        $this->startupUnfairs = $startupUnfairs;

        return $this;
    }

    /**
     * @return $this
     */
    public function setStartupUnfairSettings(?StartupUnfairSettings $startupUnfairSettings): static
    {
        $this->startupUnfairSettings = $startupUnfairSettings;

        return $this;
    }

    /**
     * @param OnCustom[]|null $oncustom
     */
    public function setOncustom(?array $oncustom): static
    {
        $this->oncustom = $oncustom;

        return $this;
    }

    /**
     * @return $this
     */
    public function setHideconfig(?bool $hideconfig): static
    {
        $this->hideconfig = $hideconfig;

        return $this;
    }
}
