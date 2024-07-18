<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

use Symfony\Component\Serializer\Annotation\SerializedName;

trait InfoTrait
{
    #[SerializedName('canVote')]
    private ?bool $vote = null;

    private ?int $minVotes = null;

    private ?int $votes = null;

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

    /**
     * @return $this
     */
    public function setFromInfo(Info|bool|null $vote, ?int $minVotes = null, ?int $votes = null): static
    {
        if ($vote instanceof Info) {
            $minVotes = $vote->getMinVotes();
            $votes = $vote->getVotes();
            $vote = $vote->canVote();
        }

        return $this->setVote($vote)
            ->setMinVotes($minVotes)
            ->setVotes($votes);
    }

    public static function createFromInfo(Info|bool|null $vote, ?int $minVotes = null, ?int $votes = null): static
    {
        return (new static())->setFromInfo(vote: $vote, minVotes: $minVotes, votes: $votes);
    }
}
