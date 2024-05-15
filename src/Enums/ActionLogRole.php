<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use function Symfony\Component\String\u;

enum ActionLogRole: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case KEYHOLDER = 'keyholder';
    case USER = 'user';
    case EXTENSION = 'extension';
    case ADMIN = 'admin';

    public function formChoiceKey(): string
    {
        return match ($this) {
            ActionLogRole::USER => 'Wearer',
            default => u($this->name)->lower()->replace('_', ' ')->title(true)->toString(),
        };
    }
}
