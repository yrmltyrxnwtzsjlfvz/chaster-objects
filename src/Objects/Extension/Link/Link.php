<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

class Link
{
    /**
     * @var string|null
     */
    private $link;

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
}
