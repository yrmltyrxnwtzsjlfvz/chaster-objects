<?php

namespace Fake\ChasterObjects\Objects\Extension\Task\Vote;

use Fake\ChasterObjects\Objects\Extension\Task\Task as ParentTask;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Task extends ParentTask
{
    #[SerializedName('nbVotes')]
    private ?int $numberVotes = null;

    public function getNumberVotes(): ?int
    {
        return $this->numberVotes;
    }

    /**
     * @return $this
     */
    public function setNumberVotes(?int $numberVotes): static
    {
        $this->numberVotes = $numberVotes;

        return $this;
    }
}
