<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

use Fake\ChasterObjects\Objects\Extension\Task\Task;

class TaskPayload
{
    private ?Task $task = null;

    public function getTask(): ?Task
    {
        return $this->task;
    }

    /**
     * @return $this
     */
    public function setTask(?Task $task): static
    {
        $this->task = $task;

        return $this;
    }
}
