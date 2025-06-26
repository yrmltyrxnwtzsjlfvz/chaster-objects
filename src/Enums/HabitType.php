<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum HabitType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case ROLL_DICE = 'roll-dice';

    case GUESS_NUMBER = 'guess-number';
}
