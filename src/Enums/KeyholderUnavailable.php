<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum KeyholderUnavailable: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case SUSPENDED = 'suspended';
    case DISABLED = 'disabled';
    case INACTIVE = 'inactive ';
}
