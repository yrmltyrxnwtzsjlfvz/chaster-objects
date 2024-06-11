<?php

namespace Fake\ChasterObjects\Tests\Enums;

use Fake\ChasterObjects\Enums\ChasterLockStatus;
use Generator;
use PHPUnit\Framework\TestCase;

/**
 * @see ChasterLockStatus
 */
class ChasterLockStatusTest extends TestCase
{
    public function testEnum()
    {
        $this->assertTrue(ChasterLockStatus::LOCKED->equals(ChasterLockStatus::tryNormalizeToEnum('LOCKED')));
    }

    /**
     * @dataProvider provideEnums
     *
     * @param ChasterLockStatus $enum
     * @param string            $icon
     * @param string            $formChoiceKey
     *
     * @return void
     */
    public function testIcon($enum, $icon, $formChoiceKey)
    {
        $this->assertEquals($icon, $enum->getIcon());
    }

    /**
     * @dataProvider provideEnums
     *
     * @param ChasterLockStatus $enum
     * @param string            $icon
     * @param string            $formChoiceKey
     *
     * @return void
     */
    public function testFormChoiceKey($enum, $icon, $formChoiceKey)
    {
        $this->assertEquals($formChoiceKey, $enum->formChoiceKey());
    }

    public function provideEnums(): Generator
    {
        yield ['enum' => ChasterLockStatus::LOCKED,   'icon' => 'fa-lock', 'formChoiceKey' => 'Locked'];
        yield ['enum' => ChasterLockStatus::UNLOCKED, 'icon' => 'fa-lock-open', 'formChoiceKey' => 'Unlocked'];
        yield ['enum' => ChasterLockStatus::DESERTED, 'icon' => 'fa-wind', 'formChoiceKey' => 'Deserted'];
        yield ['enum' => ChasterLockStatus::ARCHIVED, 'icon' => 'fa-box-archive', 'formChoiceKey' => 'Archived'];
    }
}
