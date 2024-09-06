<?php

namespace Fake\ChasterObjects\Objects\Extension\Task\Vote;

use DateTimeInterface;

trait VoteEndsAtTrait
{
    private ?DateTimeInterface $voteEndsAt = null;

    public function getVoteEndsAt(): ?DateTimeInterface
    {
        return $this->voteEndsAt;
    }

    /**
     * @return $this
     */
    public function setVoteEndsAt(?DateTimeInterface $voteEndsAt): static
    {
        $this->voteEndsAt = $voteEndsAt;

        return $this;
    }
}
