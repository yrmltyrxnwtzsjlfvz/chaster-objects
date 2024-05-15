<?php

namespace Fake\ChasterObjects\Objects\Extension;

use Fake\ChasterObjects\Objects\Traits\ExtensionTrait;

class Extension
{
    use ExtensionTrait;

    private ?string $name = null;

    private ?string $textConfig = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTextConfig(): ?string
    {
        return $this->textConfig;
    }

    /**
     * @return $this
     */
    public function setTextConfig(?string $textConfig): self
    {
        $this->textConfig = $textConfig;

        return $this;
    }
}
