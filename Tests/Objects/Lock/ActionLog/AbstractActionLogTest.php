<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog;
use Generator;
use PHPUnit\Framework\TestCase;

class AbstractActionLogTest extends TestCase
{
    /**
     * @dataProvider provideDiscriminatorType
     *
     * @return void
     */
    public function testDiscriminatorType($type, $class)
    {
        $actionLog = new $class();
        self::assertSame($type, $actionLog->getType());
    }

    public static function provideDiscriminatorType(): Generator
    {
        yield ['type' => 'combination_verified', 'class' => ActionLog\CombinationVerifiedActionLog::class];
        yield ['type' => 'dice_rolled', 'class' => ActionLog\DiceRolledActionLog::class];
        yield ['type' => 'extension_disabled', 'class' => ActionLog\ExtensionDisabledActionLog::class];
        yield ['type' => 'extension_enabled', 'class' => ActionLog\ExtensionEnabledActionLog::class];
        yield ['type' => 'extension_updated', 'class' => ActionLog\ExtensionUpdatedActionLog::class];
        yield ['type' => 'keyholder_trusted', 'class' => ActionLog\KeyholderTrustedActionLog::class];
        yield ['type' => 'link_time_changed', 'class' => ActionLog\LinkTimeChangedActionLog::class];
        yield ['type' => 'locked', 'class' => ActionLog\LockedActionLog::class];
        yield ['type' => 'lock_frozen', 'class' => ActionLog\LockFrozenActionLog::class];
        yield ['type' => 'lock_unfrozen', 'class' => ActionLog\LockUnfrozenActionLog::class];
        yield ['type' => 'max_limit_date_increased', 'class' => ActionLog\MaxLimitDateIncreasedActionLog::class];
        yield ['type' => 'max_limit_date_removed', 'class' => ActionLog\MaxLimitDateRemovedActionLog::class];
        yield ['type' => 'pillory_in', 'class' => ActionLog\PilloryInActionLog::class];
        yield ['type' => 'pillory_out', 'class' => ActionLog\PilloryOutActionLog::class];
        yield ['type' => 'session_offer_accepted', 'class' => ActionLog\SessionOfferAcceptedActionLog::class];
        yield ['type' => 'tasks_task_assigned', 'class' => ActionLog\TasksTaskAssignedActionLog::class];
        yield ['type' => 'tasks_task_completed', 'class' => ActionLog\TasksTaskCompletedActionLog::class];
        yield ['type' => 'tasks_task_failed', 'class' => ActionLog\TasksTaskFailedActionLog::class];
        yield ['type' => 'tasks_vote_ended', 'class' => ActionLog\TasksVoteEndedActionLog::class];
        yield ['type' => 'temporary_opening_locked', 'class' => ActionLog\TemporaryOpeningLockedActionLog::class];
        yield ['type' => 'temporary_opening_locked_late', 'class' => ActionLog\TemporaryOpeningLockedLateActionLog::class];
        yield ['type' => 'temporary_opening_opened', 'class' => ActionLog\TemporaryOpeningOpenedActionLog::class];
        yield ['type' => 'timer_guessed', 'class' => ActionLog\TimerGuessedActionLog::class];
        yield ['type' => 'timer_hidden', 'class' => ActionLog\TimerHiddenActionLog::class];
        yield ['type' => 'timer_revealed', 'class' => ActionLog\TimerRevealedActionLog::class];
        yield ['type' => 'time_changed', 'class' => ActionLog\TimeChangedActionLog::class];
        yield ['type' => 'time_logs_hidden', 'class' => ActionLog\TimeLogsHiddenActionLog::class];
        yield ['type' => 'time_logs_revealed', 'class' => ActionLog\TimeLogsRevealedActionLog::class];
        yield ['type' => 'unlocked', 'class' => ActionLog\UnlockedActionLog::class];
        yield ['type' => 'verification_picture_submitted', 'class' => ActionLog\VerificationPictureSubmittedActionLog::class];
        yield ['type' => 'wheel_of_fortune_turned', 'class' => ActionLog\WheelOfFortuneTurnedActionLog::class];
        yield ['type' => 'custom', 'class' => ActionLog\CustomActionLog::class];
    }
}
