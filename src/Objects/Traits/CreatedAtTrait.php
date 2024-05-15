<?php

namespace Fake\ChasterObjects\Objects\Traits;

use DateTimeInterface;

trait CreatedAtTrait
{
    /**
     * @var DateTimeInterface|null
     */
    private $createdAt;

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @return $this
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
