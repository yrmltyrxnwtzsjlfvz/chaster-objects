<?php

namespace Fake\ChasterObjects\Objects\Extension\Task;

use Symfony\Component\Validator\Constraints as Assert;

class Task
{
    #[Assert\NotNull]
    #[Assert\Length(
        min: 1,
        max: 60,
        minMessage: 'Your task must be at least {{ limit }} characters long',
        maxMessage: 'Your task cannot be longer than {{ limit }} characters',
    )]
    private ?string $task = null;

    private ?int $points = null;

    public function getTask(): ?string
    {
        return $this->task;
    }

    /**
     * @return $this
     */
    public function setTask(?string $task): static
    {
        $this->task = $task;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    /**
     * @return $this
     */
    public function setPoints(?int $points): static
    {
        $this->points = $points;

        return $this;
    }
}
