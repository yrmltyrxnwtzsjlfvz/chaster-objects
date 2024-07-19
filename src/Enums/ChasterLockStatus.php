<?php

namespace Fake\ChasterObjects\Enums;

use BadMethodCallException;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;

use function Symfony\Component\String\u;

enum ChasterLockStatus: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case LOCKED = 'locked';
    case UNLOCKED = 'unlocked';
    case DESERTED = 'deserted';
    case ARCHIVED = 'archived';

    /**
     * @deprecated Since v0.3.3, this function is deprecated
     */
    public function getIcomoonIcon(): string
    {
        trigger_deprecation('fake34526/chaster-objects', '0.3.3', 'The "%s()" method is deprecated', __METHOD__);

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

        throw new BadMethodCallException('Supplied case is not valid');
    }

    public function formChoiceKey(): string
    {
        return u($this->name)->lower()->title();
    }
}
