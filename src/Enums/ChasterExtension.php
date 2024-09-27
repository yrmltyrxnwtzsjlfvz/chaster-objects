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

    case BETTER_DICE = 'better-dice';
    case BETTER_RANDOM_EVENTS = 'better-random-events';
    case DICE = 'dice';
    case FIND_THE_KEY_1 = 'find-the-key-1';
    case GAMES = 'games';
    case GUESS_TIMER = 'guess-timer';
    case JIGSAW_PUZZLE = 'jigsaw-puzzle';
    case LINK = 'link';
    case PENALTY = 'penalty';
    case PILLORY = 'pillory';
    case RANDOM_EVENTS = 'random-events';
    case TASKS = 'tasks';
    case TEMPORARY_OPENING = 'temporary-opening';
    case UNLOCK_CONDITION = 'unlock-condition';
    case VERIFICATION_PICTURE = 'verification-picture';
    case WHEEL_OF_FORTUNE = 'wheel-of-fortune';
    case WORDLE = 'wordle';

    public static function getFormChoiceKey(UnitEnum $value): string
    {
        return match ($value) {
            ChasterExtension::FIND_THE_KEY_1 => 'Find The Key',
            ChasterExtension::GUESS_TIMER => 'Guess the Timer',
            ChasterExtension::LINK => 'Share links',
            ChasterExtension::PENALTY => 'Penalties',
            ChasterExtension::TEMPORARY_OPENING => 'Hygiene opening',
            ChasterExtension::UNLOCK_CONDITION => 'Unlock Gamble',
            ChasterExtension::VERIFICATION_PICTURE => 'Verification picture',
            ChasterExtension::WHEEL_OF_FORTUNE => 'Wheel of Fortune',
            default => u($value->name)->lower()->replace('_', ' ')->title(true)->toString(),
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
            ChasterExtension::BETTER_DICE,
            ChasterExtension::GAMES,
            ChasterExtension::DICE,
            ChasterExtension::FIND_THE_KEY_1,
            ChasterExtension::JIGSAW_PUZZLE,
            ChasterExtension::WHEEL_OF_FORTUNE,
            ChasterExtension::WORDLE,
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
            default => u($this->name)->lower()->replace('_', ' ')->title(allWords: true)->replace(' ', '')->prepend('\\')->prepend('\Fake\ChasterObjects\Objects\Extension')->append('\\Config')->toString(),
        };
    }

    public function getIcomoonIcon(): ?string
    {
        return match ($this) {
            ChasterExtension::DICE => 'icon-fa-dice',
            ChasterExtension::PILLORY => 'icon-dominatrix-whip-alt',
            ChasterExtension::WHEEL_OF_FORTUNE => 'icon-wheel-of-fortune',
            default => $this->getIcon(),
        };
    }

    public function getIcon(): string
    {
        return match ($this) {
            ChasterExtension::BETTER_DICE, ChasterExtension::DICE => 'fa-solid fa-dice',
            ChasterExtension::BETTER_RANDOM_EVENTS => 'fa-solid fa-shuffle',
            ChasterExtension::FIND_THE_KEY_1 => 'fa-solid fa-key',
            ChasterExtension::GAMES => 'fa-solid fa-chess-board',
            ChasterExtension::GUESS_TIMER => 'fa-solid fa-clock',
            ChasterExtension::JIGSAW_PUZZLE => 'fa-solid fa-puzzle-piece',
            ChasterExtension::LINK => 'fa-solid fa-link',
            ChasterExtension::PENALTY => 'fa-solid fa-gavel',
            ChasterExtension::PILLORY => 'fa-solid fa-user-friends',
            ChasterExtension::RANDOM_EVENTS => 'fa-solid fa-random',
            ChasterExtension::TASKS => 'fa-solid fa-tasks',
            ChasterExtension::TEMPORARY_OPENING => 'fa-solid fa-soap',
            ChasterExtension::UNLOCK_CONDITION => 'fa-solid fa-traffic-light-slow',
            ChasterExtension::VERIFICATION_PICTURE => 'fa-solid fa-camera',
            ChasterExtension::WHEEL_OF_FORTUNE => 'fa-solid fa-dharmachakra',
            ChasterExtension::WORDLE => 'fa-solid fa-border-all',
            default => throw new ValueError(),
        };
    }
}
