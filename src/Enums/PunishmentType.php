<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum PunishmentType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case ADD_TIME = 'add_time';

    case FREEZE = 'freeze';

    case PILLORY = 'pillory';
}
