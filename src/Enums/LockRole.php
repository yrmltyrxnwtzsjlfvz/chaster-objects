<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum LockRole: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case KEYHOLDER = 'keyholder';
    case WEARER = 'wearer';
    case VISITOR = 'visitor';
}
