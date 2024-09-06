<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner;

use Fake\ChasterObjects\Enums\HomeAction as HomeActionEnum;

class HomeAction
{
    /**
     * An identifier that is returned to the extension when the user navigates to the extension page.
     */
    private ?string $slug = null;

    /**
     * The title displayed on the list item for the action.
     */
    private ?string $title = null;

    /**
     * The description displayed on the list item for the action.
     */
    private ?string $description = null;

    /**
     * The icon associated with the action, which must be one of the valid FontAwesome 5 icons.
     */
    private ?string $icon = null;

    /**
     * Displays a small badge on the list item, useful for indicating notifications or counts associated with the action (e.g., the number of tasks to do or remaining actions in the extension).
     */
    private ?string $badge = null;

    public static function create(HomeActionEnum|string $slug, string $title, string $description, string $icon, ?string $badge = null): static
    {
        return (new static())
            ->setSlug($slug)
            ->setTitle($title)
            ->setDescription($description)
            ->setIcon($icon)
            ->setBadge($badge);
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(HomeActionEnum|string|null $slug): self
    {
        $this->slug = HomeActionEnum::tryNormalizeToValue($slug) ?? $slug;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(?string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    public function getBadge(): ?string
    {
        return $this->badge;
    }

    public function setBadge(string|int|null $badge): self
    {
        $this->badge = (string) $badge;

        return $this;
    }
}
