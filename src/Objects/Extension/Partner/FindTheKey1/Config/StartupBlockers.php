<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;

class StartupBlockers
{
    private ?string $type = null;

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return $this
     */
    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }
}
