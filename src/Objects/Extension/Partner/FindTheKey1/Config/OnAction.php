<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

#[Context([AbstractObjectNormalizer::SKIP_NULL_VALUES => true])]
class OnAction
{
    private ?string $action = null;

    private ?int $time = null;

    private ?int $number = null;

    public function getAction(): ?string
    {
        return $this->action;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    /**
     * @return $this
     */
    public function setAction(?string $action): static
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return $this
     */
    public function setTime(?int $time): static
    {
        $this->time = $time;

        return $this;
    }

    /**
     * @return $this
     */
    public function setNumber(?int $number): static
    {
        $this->number = $number;

        return $this;
    }
}
