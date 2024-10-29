<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\JigsawPuzzle\Config;

use Symfony\Component\Validator\Constraints as Assert;

class Puzzles
{
    private ?bool $completed = false;

    #[Assert\GreaterThanOrEqual(-1)]
    private ?int $pieces = -1;

    #[Assert\GreaterThanOrEqual(-1)]
    private ?int $timeLimit = -1;

    #[Assert\Url]
    private ?string $url = null;

    public function isCompleted(): ?bool
    {
        return $this->completed;
    }

    /**
     * @return $this
     */
    public function setCompleted(?bool $completed): static
    {
        $this->completed = $completed;

        return $this;
    }

    public function getPieces(): ?int
    {
        return $this->pieces;
    }

    /**
     * @return $this
     */
    public function setPieces(?int $pieces): static
    {
        $this->pieces = $pieces;

        return $this;
    }

    public function getTimeLimit(): ?int
    {
        return $this->timeLimit;
    }

    /**
     * @return $this
     */
    public function setTimeLimit(?int $timeLimit): static
    {
        $this->timeLimit = $timeLimit;

        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * @return $this
     */
    public function setUrl(?string $url): static
    {
        $this->url = $url;

        return $this;
    }
}
