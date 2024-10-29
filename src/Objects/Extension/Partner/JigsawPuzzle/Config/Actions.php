<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\JigsawPuzzle\Config;

class Actions
{
    private ?string $action = null;

    private ?int $data = null;

    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @return $this
     */
    public function setAction(?string $action): static
    {
        $this->action = $action;

        return $this;
    }

    public function getData(): ?int
    {
        return $this->data;
    }

    /**
     * @return $this
     */
    public function setData(?int $data): static
    {
        $this->data = $data;

        return $this;
    }
}
