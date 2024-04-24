<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum ExtensionMode: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case UNLIMITED = 'unlimited';
    case NON_CUMULATIVE = 'non_cumulative';
    case CUMULATIVE = 'cumulative';
    case TURN = 'turn';

    /**
     * @return array<string>
     */
    public static function provideFormChoices(): array
    {
        $return = [];
        foreach (static::cases() as $value) {
            if (!$value->equals(ExtensionMode::TURN)) {
                $return[static::getFormChoiceKey($value)] = static::getFormChoiceValue($value);
            }
        }

        return $return;
    }
}
