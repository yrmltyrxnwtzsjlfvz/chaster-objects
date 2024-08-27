<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Extension\WheelOfFortune\Segment;

class WheelOfFortunePayload
{
    private ?Segment $segment = null;

    public function getSegment(): ?Segment
    {
        return $this->segment;
    }

    /**
     * @return $this
     */
    public function setSegment(?Segment $segment): static
    {
        $this->segment = $segment;

        return $this;
    }
}
