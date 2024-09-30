<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\TaskPayload;

class TasksVoteEndedActionLog extends TasksTaskAssignedActionLog
{
    protected ?string $type = 'tasks_vote_ended';
}
