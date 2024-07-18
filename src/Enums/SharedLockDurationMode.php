<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum SharedLockDurationMode: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case DURATION = 'duration';
    case DATE = 'date';
}
