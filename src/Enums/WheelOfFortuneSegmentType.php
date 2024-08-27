<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum WheelOfFortuneSegmentType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case ADD_TIME = 'add-time';

    case REMOVE_TIME = 'remove-time';

    case ADD_REMOVE_TIME = 'add-remove-time';

    case FREEZE = 'set-freeze';

    case UNFREEZE = 'set-unfreeze';

    case FREEZE_UNFREEZE = 'freeze';

    case PILLORY = 'pillory';

    case TEXT = 'text';
}
