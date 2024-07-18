<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

trait LinkTrait
{
    private ?string $link = null;

    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @return $this
     */
    public function setLink(?string $link): static
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return $this
     */
    public function setFromLink(Link|string|null $link): static
    {
        if ($link instanceof Link) {
            $link = $link->getLink();
        }

        return $this->setLink($link);
    }

    public static function createFromLink(Link|string|null $link): static
    {
        return (new static())->setFromLink(link: $link);
    }
}
