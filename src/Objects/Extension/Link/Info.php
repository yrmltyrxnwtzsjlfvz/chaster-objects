<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

use Symfony\Component\Serializer\Annotation\SerializedName;

class Info
{
    /**
     * @var bool|null
     */
    #[SerializedName('canVote')]
    private $vote;

    /**
     * @var int|null
     */
    private $minVotes;

    /**
     * @var int|null
     */
    private $votes;

    public function canVote(): ?bool
    {
        return $this->vote;
    }

    /**
     * @return $this
     */
    public function setVote(?bool $vote): static
    {
        $this->vote = $vote;

        return $this;
    }

    public function getMinVotes(): ?int
    {
        return $this->minVotes;
    }

    /**
     * @return $this
     */
    public function setMinVotes(?int $minVotes): static
    {
        $this->minVotes = $minVotes;

        return $this;
    }

    public function getVotes(): ?int
    {
        return $this->votes;
    }

    /**
     * @return $this
     */
    public function setVotes(?int $votes): static
    {
        $this->votes = $votes;

        return $this;
    }
}
