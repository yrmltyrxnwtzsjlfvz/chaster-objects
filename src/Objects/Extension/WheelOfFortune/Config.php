<?php

namespace Fake\ChasterObjects\Objects\Extension\WheelOfFortune;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;

class Config implements ExtensionConfigInterface
{
    /** @var Segment[]|null */
    private ?array $segments = [];

    /**
     * @return Segment[]|null
     */
    public function getSegments(): ?array
    {
        return $this->segments;
    }

    /**
     * @param Segment[]|null $segments
     *
     * @return $this
     */
    public function setSegments(?array $segments): static
    {
        $this->segments = $segments;

        return $this;
    }
}
