<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TaskPayload;

class TasksVoteEndedActionLog extends AbstractActionLog
{
    protected ?string $type = 'tasks_vote_ended';

    private ?TaskPayload $payload;

    public function getPayload(): ?TaskPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?TaskPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
