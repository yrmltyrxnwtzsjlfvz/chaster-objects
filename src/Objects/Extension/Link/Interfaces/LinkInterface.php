<?php

namespace Fake\ChasterObjects\Objects\Extension\Link\Interfaces;

use Fake\ChasterObjects\Objects\Extension\Link\Link;

interface LinkInterface
{
    /**
     * @return $this
     */
    public function setLink(?string $link): static;

    /**
     * @return $this
     */
    public function setFromLink(Link|string|null $link): static;

    public static function createFromLink(Link|string|null $link): static;
}
