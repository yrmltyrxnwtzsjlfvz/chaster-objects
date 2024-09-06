<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum HomeAction: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case PENALTY_TASKS_TO_COMPLETE = 'penalty_tasks_to_complete';
    case PILLORY_IN_PILLORY = 'pillory_in_pillory';
    case TASKS_DO_TASK = 'tasks_do_task';
    case VERIFICATION_PICTURE_SUBMIT = 'verification_picture_submit';

    case BETTER_DICE_ROLL_PENALTY = 'better-dice-roll-penalty';

    case START = 'start';
}
