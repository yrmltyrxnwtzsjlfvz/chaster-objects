<?php

namespace Fake\ChasterObjects\Objects\Extension\WheelOfFortune;

use Fake\ChasterObjects\Enums\WheelOfFortuneSegmentType;
use Fake\ChasterObjects\Objects\Traits\DurationTrait;

class Segment
{
    use DurationTrait;

    private ?WheelOfFortuneSegmentType $type = null;

    private ?string $text = null;

    public function getType(): ?WheelOfFortuneSegmentType
    {
        return $this->type;
    }

    public function setType(?WheelOfFortuneSegmentType $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function isText(): bool
    {
        return $this->getType()?->equals(WheelOfFortuneSegmentType::TEXT) ?? false;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
    }
}
