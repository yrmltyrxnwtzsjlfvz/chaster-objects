<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

#[Context([AbstractObjectNormalizer::SKIP_NULL_VALUES => true])]
class OnCustom
{
    private ?string $event = null;

    private string|int|null $detail = null;

    /** @var CustomAction[]|null */
    private ?array $actions = [];

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function getDetail(): string|int|null
    {
        return $this->detail;
    }

    /**
     * @return CustomAction[]|null
     */
    public function getActions(): ?array
    {
        return $this->actions;
    }

    /**
     * @return $this
     */
    public function setEvent(?string $event): static
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDetail(string|int|null $detail): static
    {
        $this->detail = $detail;

        return $this;
    }

    /**
     * @param CustomAction[]|null $actions
     */
    public function setActions(?array $actions): static
    {
        $this->actions = $actions;

        return $this;
    }
}
