<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum VerificationPictureVisibility: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case KEYHOLDER = 'keyholder';
    case EVERYONE = 'all';
}
