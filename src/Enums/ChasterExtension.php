<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use Fake\ChasterObjects\Objects\Extension\Task\Config;

use function Symfony\Component\String\u;

use UnitEnum;
use ValueError;

/**
 * @method static array<string, string> provideDailyActionFormChoices()
 * @method static array<string, string> provideGameFormChoices()
 * @method static array<string, string> provideLinkTasksFormChoices()
 */
enum ChasterExtension: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case DICE = 'dice';
    case GUESS_TIMER = 'guess-timer';
    case LINK = 'link';
    case PENALTY = 'penalty';
    case PILLORY = 'pillory';
    case RANDOM_EVENTS = 'random-events';
    case TASKS = 'tasks';
    case TEMPORARY_OPENING = 'temporary-opening';
    case VERIFICATION_PICTURE = 'verification-picture';
    case WHEEL_OF_FORTUNE = 'wheel-of-fortune';

    public static function getFormChoiceKey(UnitEnum $value): string
    {
        return match ($value) {
            ChasterExtension::GUESS_TIMER => 'Guess the timer',
            ChasterExtension::TEMPORARY_OPENING => 'Hygiene opening',
            ChasterExtension::WHEEL_OF_FORTUNE => 'Wheel of Fortune',
            default => u($value->name)->lower()->replace('_', ' ')->title(false)->toString(),
        };
    }

    /**
     * is triggered when invoking inaccessible methods in a static context.
     *
     * @see https://php.net/manual/en/language.oop5.overloading.php#language.oop5.overloading.methods
     */
    public static function __callStatic(string $name, array $arguments)
    {
        return match ($name) {
            'provideGameFormChoices' => static::provideFormChoices(static::getGameExtensions()),
            'provideDailyActionFormChoices' => static::provideFormChoices(static::getDailyActionExtensions()),
            'provideLinkTasksFormChoices' => static::provideFormChoices(static::getLinkTasksExtensions()),
            default => null,
        };
    }

    /**
     * @return ChasterExtension[]
     */
    public static function getGameExtensions(): array
    {
        return [
            ChasterExtension::DICE,
            ChasterExtension::WHEEL_OF_FORTUNE,
        ];
    }

    /**
     * @return ChasterExtension[]
     */
    public static function getDailyActionExtensions(): array
    {
        return [
            ChasterExtension::TEMPORARY_OPENING,
            ChasterExtension::LINK,
            ChasterExtension::PENALTY,
            ChasterExtension::TASKS,
            ChasterExtension::VERIFICATION_PICTURE,
        ];
    }

    /**
     * @return ChasterExtension[]
     */
    public static function getLinkTasksExtensions(): array
    {
        return [
            ChasterExtension::LINK,
            ChasterExtension::TASKS,
        ];
    }

    public static function getIconFor(ChasterExtension|string $name): string
    {
        try {
            return ChasterExtension::tryNormalizeToEnum($name)?->getIcon() ?? 'fa-solid fa-puzzle-piece';
        } catch (ValueError) {
            return 'fa-solid fa-puzzle-piece';
        }
    }

    public function snakeCaseValue(): string
    {
        return u($this->value)->snake()->toString();
    }

    public function getConfigClass(): string
    {
        return match ($this) {
            self::TASKS => Config::class,
            default => u($this->name)->lower()->replace('_', ' ')->title(allWords: true)->replace(' ', '')->prepend('\\')->prepend('\App\Objects\Chaster\Extension')->append('\\Config')->toString(),
        };
    }

    public function getIcomoonIcon(): ?string
    {
        return match ($this) {
            ChasterExtension::DICE => 'icon-fa-dice',
            default => $this->getIcon(),
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            ChasterExtension::DICE => 'fa-solid fa-dice',
            ChasterExtension::GUESS_TIMER => 'fa-solid fa-clock',
            ChasterExtension::LINK => 'fa-solid fa-link',
            ChasterExtension::PENALTY => 'fa-solid fa-gavel',
            ChasterExtension::PILLORY => 'icon-dominatrix-whip-alt',
            ChasterExtension::RANDOM_EVENTS => 'fa-solid fa-shuffle',
            ChasterExtension::TASKS => 'fa-solid fa-tasks',
            ChasterExtension::TEMPORARY_OPENING => 'fa-solid fa-soap',
            ChasterExtension::VERIFICATION_PICTURE => 'fa-solid fa-camera',
            ChasterExtension::WHEEL_OF_FORTUNE => 'icon-wheel-of-fortune',
            default => throw new ValueError(),
        };
    }
}
