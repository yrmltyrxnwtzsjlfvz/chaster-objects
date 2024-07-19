<?php

namespace Fake\ChasterObjects\Objects\Traits;

use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

trait LockTrait
{
    use ProgressTrait;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?DateTimeInterface $maxLimitDate = null;

    public function setMaxLimitDate(?DateTimeInterface $maxLimitDate): static
    {
        $this->maxLimitDate = $maxLimitDate;

        return $this;
    }

    public function hasMaxLimitDate(): bool
    {
        return !empty($this->getMaxLimitDate());
    }

    public function getMaxLimitDate(): ?DateTimeInterface
    {
        return $this->maxLimitDate;
    }
}
