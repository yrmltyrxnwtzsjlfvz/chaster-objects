<?php

namespace Fake\ChasterObjects\Objects\Extension\Link\Traits;

use Fake\ChasterObjects\Objects\Extension\Link\Interfaces\LinkInterface;

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
    public function setFromLink(LinkInterface|string|null $link): static
    {
        if ($link instanceof LinkInterface) {
            $link = $link->getLink();
        }

        return $this->setLink($link);
    }

    public static function createFromLink(LinkInterface|string|null $link): static
    {
        return (new static())->setFromLink(link: $link);
    }
}
