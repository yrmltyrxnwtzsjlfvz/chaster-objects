<?php

namespace Fake\ChasterObjects\Objects\Lock;

use Bytes\DateBundle\Objects\ComparableDateInterval;
use Fake\ChasterObjects\Objects\Traits\ChasterIdTrait;
use Fake\ChasterObjects\Objects\Traits\CreatedAtTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

class PilloryStatus
{
    use ChasterIdTrait;
    use CreatedAtTrait;

    /**
     * @var int|null
     */
    #[SerializedName('nbVotes')]
    private $numberOfVotes;

    /**
     * @var int|null
     */
    private $totalDurationAdded;

    /**
     * @var \DateTimeInterface|null
     */
    private $voteEndsAt;

    /**
     * @var bool|null
     */
    private $canVote;

    /**
     * @var string|null
     */
    private $reason;

    public function getNumberOfVotes(): ?int
    {
        return $this->numberOfVotes;
    }

    /**
     * @return $this
     */
    public function setNumberOfVotes(?int $numberOfVotes): static
    {
        $this->numberOfVotes = $numberOfVotes;

        return $this;
    }

    public function getTotalDurationAdded(): ?int
    {
        return $this->totalDurationAdded;
    }

    /**
     * @return $this
     */
    public function setTotalDurationAdded(?int $totalDurationAdded): static
    {
        $this->totalDurationAdded = $totalDurationAdded;

        return $this;
    }

    public function getVoteEndsAt(): ?\DateTimeInterface
    {
        return $this->voteEndsAt;
    }

    /**
     * @return $this
     */
    public function setVoteEndsAt(?\DateTimeInterface $voteEndsAt): static
    {
        $this->voteEndsAt = $voteEndsAt;

        return $this;
    }

    public function getCanVote(): ?bool
    {
        return $this->canVote;
    }

    /**
     * @return $this
     */
    public function setCanVote(?bool $canVote): static
    {
        $this->canVote = $canVote;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @return $this
     */
    public function setReason(?string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getTotalDurationAddedAsInterval(): \DateInterval
    {
        return ComparableDateInterval::secondsToInterval($this->totalDurationAdded ?? 0);
    }
}
