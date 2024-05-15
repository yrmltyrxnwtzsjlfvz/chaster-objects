<?php

namespace Fake\ChasterObjects\Objects\Traits;

use Symfony\Component\Serializer\Annotation\SerializedName;

trait ChasterIdTrait
{
    /**
     * @var string|null
     */
    #[SerializedName('_id')]
    private $id;

    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(?string $id): static
    {
        $this->id = $id;

        return $this;
    }
}
