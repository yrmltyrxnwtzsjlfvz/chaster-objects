<?php

namespace Fake\ChasterObjects\Objects\Traits;

trait NameTrait
{
    private ?string $name = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
