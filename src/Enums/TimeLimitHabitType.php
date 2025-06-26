<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum TimeLimitHabitType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case GUESS_NUMBER_TIME = 'guess-number-time';
}
