<?php

namespace Fake\ChasterObjects\Objects;

use Fake\ChasterObjects\Enums\ExtensionMode;
use Symfony\Component\Serializer\Attribute\SerializedName;

class ExtensionPublic
{
    private ?string $subtitle = null;

    private ?string $summary = null;

    private ?string $displayName = null;

    private ?string $icon = null;

    private ?string $slug = null;

    /**
     * @var ExtensionMode[]
     */
    private array $availableModes = [];

    // private $defaultConfig = null;

    private ?int $defaultRegularity = null;

    #[SerializedName('isEnabled')]
    private bool $enabled = false;

    #[SerializedName('isPremium')]
    private bool $premium = false;

    #[SerializedName('isCountedInExtensionsLimit')]
    private bool $countedInExtensionsLimit = false;

    #[SerializedName('isPartner')]
    private bool $partner = false;

    #[SerializedName('isFeatured')]
    private bool $featured = false;

    #[SerializedName('isTesting')]
    private bool $testing = false;

    #[SerializedName('isDevelopedByCommunity')]
    private bool $developedByCommunity = false;

    #[SerializedName('hasActions')]
    private bool $actions = false;

    private ?string $configIframeUrl = null;

    private ?string $partnerExtensionId = null;

    // private $owner = null;

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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return $this
     */
    public function setSlug(?string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return ExtensionMode[]
     */
    public function getAvailableModes(): array
    {
        return $this->availableModes;
    }

    /**
     * @param ExtensionMode[] $availableModes
     * @return $this
     */
    public function setAvailableModes(array $availableModes): static
    {
        $this->availableModes = $availableModes;

        return $this;
    }

    public function getDefaultRegularity(): ?int
    {
        return $this->defaultRegularity;
    }

    /**
     * @return $this
     */
    public function setDefaultRegularity(?int $defaultRegularity): static
    {
        $this->defaultRegularity = $defaultRegularity;

        return $this;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @return $this
     */
    public function setEnabled(bool $enabled): static
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function isPremium(): bool
    {
        return $this->premium;
    }

    /**
     * @return $this
     */
    public function setPremium(bool $premium): static
    {
        $this->premium = $premium;

        return $this;
    }

    public function isCountedInExtensionsLimit(): bool
    {
        return $this->countedInExtensionsLimit;
    }

    /**
     * @return $this
     */
    public function setCountedInExtensionsLimit(bool $countedInExtensionsLimit): static
    {
        $this->countedInExtensionsLimit = $countedInExtensionsLimit;

        return $this;
    }

    public function isPartner(): bool
    {
        return $this->partner;
    }

    /**
     * @return $this
     */
    public function setPartner(bool $partner): static
    {
        $this->partner = $partner;

        return $this;
    }

    public function isFeatured(): bool
    {
        return $this->featured;
    }

    /**
     * @return $this
     */
    public function setFeatured(bool $featured): static
    {
        $this->featured = $featured;

        return $this;
    }

    public function isTesting(): bool
    {
        return $this->testing;
    }

    /**
     * @return $this
     */
    public function setTesting(bool $testing): static
    {
        $this->testing = $testing;

        return $this;
    }

    public function isDevelopedByCommunity(): bool
    {
        return $this->developedByCommunity;
    }

    /**
     * @return $this
     */
    public function setDevelopedByCommunity(bool $developedByCommunity): static
    {
        $this->developedByCommunity = $developedByCommunity;

        return $this;
    }

    public function hasActions(): bool
    {
        return $this->actions;
    }

    /**
     * @return $this
     */
    public function setActions(bool $actions): static
    {
        $this->actions = $actions;

        return $this;
    }

    public function getConfigIframeUrl(): ?string
    {
        return $this->configIframeUrl;
    }

    /**
     * @return $this
     */
    public function setConfigIframeUrl(?string $configIframeUrl): static
    {
        $this->configIframeUrl = $configIframeUrl;

        return $this;
    }

    public function getPartnerExtensionId(): ?string
    {
        return $this->partnerExtensionId;
    }

    /**
     * @return $this
     */
    public function setPartnerExtensionId(?string $partnerExtensionId): static
    {
        $this->partnerExtensionId = $partnerExtensionId;

        return $this;
    }
}
