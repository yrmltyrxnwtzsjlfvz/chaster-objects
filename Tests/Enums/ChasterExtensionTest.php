<?php

namespace Fake\ChasterObjects\Tests\Enums;

use Fake\ChasterObjects\Enums\ChasterExtension;
use Generator;
use PHPUnit\Framework\TestCase;

class ChasterExtensionTest extends TestCase
{
    /**
     * @dataProvider provideGetFormChoiceKey
     *
     * @return void
     */
    public function testGetFormChoiceKey($enum, $expected)
    {
        self::assertSame($expected, ChasterExtension::getFormChoiceKey($enum));
    }

    public static function provideGetFormChoiceKey(): Generator
    {
        yield ['enum' => ChasterExtension::BETTER_DICE, 'expected' => 'Better Dice'];
        yield ['enum' => ChasterExtension::BETTER_RANDOM_EVENTS, 'expected' => 'Better Random Events'];
        yield ['enum' => ChasterExtension::DICE, 'expected' => 'Dice'];
        yield ['enum' => ChasterExtension::FIND_THE_KEY_1, 'expected' => 'Find The Key'];
        yield ['enum' => ChasterExtension::GUESS_TIMER, 'expected' => 'Guess the Timer'];
        yield ['enum' => ChasterExtension::JIGSAW_PUZZLE, 'expected' => 'Jigsaw Puzzle'];
        yield ['enum' => ChasterExtension::LINK, 'expected' => 'Share links'];
        yield ['enum' => ChasterExtension::PENALTY, 'expected' => 'Penalties'];
        yield ['enum' => ChasterExtension::PILLORY, 'expected' => 'Pillory'];
        yield ['enum' => ChasterExtension::RANDOM_EVENTS, 'expected' => 'Random Events'];
        yield ['enum' => ChasterExtension::TASKS, 'expected' => 'Tasks'];
        yield ['enum' => ChasterExtension::TEMPORARY_OPENING, 'expected' => 'Hygiene opening'];
        yield ['enum' => ChasterExtension::UNLOCK_CONDITION, 'expected' => 'Unlock Gamble'];
        yield ['enum' => ChasterExtension::VERIFICATION_PICTURE, 'expected' => 'Verification picture'];
        yield ['enum' => ChasterExtension::WHEEL_OF_FORTUNE, 'expected' => 'Wheel of Fortune'];
        yield ['enum' => ChasterExtension::WORDLE, 'expected' => 'Wordle'];
    }
}
