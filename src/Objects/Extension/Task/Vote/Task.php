<?php

namespace Fake\ChasterObjects\Objects\Extension\Task\Vote;

use Fake\ChasterObjects\Objects\Extension\Task\Task as ParentTask;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Task extends ParentTask
{
    /**
     * @var int|null
     */
    #[SerializedName('nbVotes')]
    private $numberVotes;

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
