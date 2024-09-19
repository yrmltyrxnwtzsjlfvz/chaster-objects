<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

class TasksTaskFailedActionLog extends TasksTaskCompletedActionLog
{
    protected ?string $type = 'tasks_task_failed';
}
