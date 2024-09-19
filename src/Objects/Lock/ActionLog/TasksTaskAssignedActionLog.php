<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TaskPayload;

class TasksTaskAssignedActionLog extends AbstractActionLog
{
    protected ?string $type = 'tasks_task_assigned';

    protected ?string $extension = 'tasks';

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
