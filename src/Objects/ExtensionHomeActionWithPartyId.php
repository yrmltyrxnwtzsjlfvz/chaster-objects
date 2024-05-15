<?php

namespace Fake\ChasterObjects\Objects;

class ExtensionHomeActionWithPartyId
{
    /**
     * @var string|null
     */
    private $extensionPartyId;

    /**
     * @var string|null
     */
    private $slug;

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
    private $icon;

    /**
     * @var string|null
     */
    private $badge;

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
     * @return $this
     */
    public function setDescription(?string $description): static
    {
        $this->description = $description;

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

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    /**
     * @return $this
     */
    public function setBadge(?string $badge): static
    {
        $this->badge = $badge;

        return $this;
    }
}
