<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

enum ChasterLockStatus: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case LOCKED = 'locked';
    case UNLOCKED = 'unlocked';
    case DESERTED = 'deserted';
    case ARCHIVED = 'archived';

    public function getIcomoonIcon(): string
    {
        return 'icon-'.$this->getIcon();
    }

    public function getIcon(): string
    {
        switch ($this) {
            case ChasterLockStatus::LOCKED:
                return 'fa-lock';
                break;
            case ChasterLockStatus::UNLOCKED:
                return 'fa-lock-open';
                break;
            case ChasterLockStatus::DESERTED:
                return 'fa-wind';
                break;
            case ChasterLockStatus::ARCHIVED:
                return 'fa-box-archive';
                break;
        }

        throw new \BadMethodCallException('Supplied case is not valid');
    }
}
