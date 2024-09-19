<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TaskCompletionPayload;

class TasksTaskCompletedActionLog extends AbstractActionLog
{
    protected ?string $type = 'tasks_task_completed';

    protected ?string $extension = 'tasks';

    private ?TaskCompletionPayload $payload;

    public function getPayload(): ?TaskCompletionPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?TaskCompletionPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
