<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum TaskStatus: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case VOTE = 'vote';
    case ASSIGNED = 'pending';
    case NONE = 'start';
}
