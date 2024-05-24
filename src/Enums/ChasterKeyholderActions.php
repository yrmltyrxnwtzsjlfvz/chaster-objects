<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use function Symfony\Component\String\u;

enum ChasterKeyholderActions: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case TIME = 'TIME';
    case PILLORY = 'PILLORY';
    case FREEZE = 'FREEZE';
    case UNFREEZE = 'UNFREEZE';
    case TASK = 'TASK';
    case HIDE_TIMER = 'HIDE_TIMER';
    case SHOW_TIMER = 'SHOW_TIMER';
    case ADD_TASK_POINTS = 'ADD_TASK_POINTS';
    case REMOVE_TASK_POINTS = 'REMOVE_TASK_POINTS';
    case ADD_SHARE_LINKS = 'ADD_SHARE_LINKS';
    case REMOVE_SHARE_LINKS = 'REMOVE_SHARE_LINKS';
    case UNLOCK = 'unlock';
    case ARCHIVE = 'archive';

    public static function tryFromPunishment(string $value): ?ChasterKeyholderActions
    {
        $value = u($value)->upper()->toString();
        if ('ADD_TIME' === $value) {
            return ChasterKeyholderActions::TIME;
        }

        return ChasterKeyholderActions::tryFrom($value);
    }

    /**
     * @return ChasterKeyholderActions[]
     */
    public static function guessTimerExcludedActions(): array
    {
        return [
            ChasterKeyholderActions::HIDE_TIMER,
            ChasterKeyholderActions::SHOW_TIMER,
        ];
    }
}
