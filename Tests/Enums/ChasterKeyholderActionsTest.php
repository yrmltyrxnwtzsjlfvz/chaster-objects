<?php

namespace Fake\ChasterObjects\Tests\Enums;

use Fake\ChasterObjects\Enums\ChasterKeyholderActions;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @see ChasterKeyholderActions
 */
class ChasterKeyholderActionsTest extends TestCase
{
    public function testEnum()
    {
        $this->assertTrue(ChasterKeyholderActions::FREEZE->equals(ChasterKeyholderActions::tryNormalizeToEnum('FREEZE')));
    }

    public function provideTryFromPunishments(): Generator
    {
        yield ['expected' => ChasterKeyholderActions::TIME, 'test' => 'TIME'];
        yield ['expected' => ChasterKeyholderActions::TIME, 'test' => 'ADD_TIME'];
        yield ['expected' => ChasterKeyholderActions::TIME, 'test' => 'time'];
        yield ['expected' => ChasterKeyholderActions::TIME, 'test' => 'add_time'];
        yield ['expected' => ChasterKeyholderActions::FREEZE, 'test' => 'freeze'];
    }

    /**
     * @dataProvider provideTryFromPunishments
     *
     * @param ChasterKeyholderActions $expected
     *
     * @return void
     */
    public function testTryFromPunishment($expected, $test)
    {
        $this->assertTrue($expected->equals(ChasterKeyholderActions::tryFromPunishment($test)));
    }

    public function testGuessTimerExcludedActions()
    {
        $result = ChasterKeyholderActions::guessTimerExcludedActions();
        $this->assertCount(2, $result);
        $this->assertContains(ChasterKeyholderActions::HIDE_TIMER, $result);
        $this->assertContains(ChasterKeyholderActions::SHOW_TIMER, $result);
    }
}
