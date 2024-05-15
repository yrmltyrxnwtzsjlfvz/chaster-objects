<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum ReasonPreventingUnlock: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case TEMPORARY_OPENING = 'temporary_opening';
    case LINK_NOT_ENOUGH_VOTES = 'link_not_enough_votes';
    case TASKS = 'tasks';
    case GUESS_TIMER = 'guess_timer';
}
