<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Enums\ChasterExtension;
use Fake\ChasterObjects\Objects\Lock\ActionLog;
use Generator;
use PHPUnit\Framework\TestCase;

class AbstractActionLogTest extends TestCase
{
    public static function provideDiscriminatorType(): Generator
    {
        yield ['class' => ActionLog\CombinationVerifiedActionLog::class, 'type' => 'combination_verified', 'extension' => null];
        yield ['class' => ActionLog\DiceRolledActionLog::class, 'type' => 'dice_rolled', 'extension' => 'dice'];
        yield ['class' => ActionLog\ExtensionDisabledActionLog::class, 'type' => 'extension_disabled', 'extension' => null];
        yield ['class' => ActionLog\ExtensionEnabledActionLog::class, 'type' => 'extension_enabled', 'extension' => null];
        yield ['class' => ActionLog\ExtensionUpdatedActionLog::class, 'type' => 'extension_updated', 'extension' => null];
        yield ['class' => ActionLog\KeyholderTrustedActionLog::class, 'type' => 'keyholder_trusted', 'extension' => null];
        yield ['class' => ActionLog\LinkTimeChangedActionLog::class, 'type' => 'link_time_changed', 'extension' => 'link'];
        yield ['class' => ActionLog\LockedActionLog::class, 'type' => 'locked', 'extension' => null];
        yield ['class' => ActionLog\LockFrozenActionLog::class, 'type' => 'lock_frozen', 'extension' => null];
        yield ['class' => ActionLog\LockUnfrozenActionLog::class, 'type' => 'lock_unfrozen', 'extension' => null];
        yield ['class' => ActionLog\MaxLimitDateIncreasedActionLog::class, 'type' => 'max_limit_date_increased', 'extension' => null];
        yield ['class' => ActionLog\MaxLimitDateRemovedActionLog::class, 'type' => 'max_limit_date_removed', 'extension' => null];
        yield ['class' => ActionLog\PilloryInActionLog::class, 'type' => 'pillory_in', 'extension' => null];
        yield ['class' => ActionLog\PilloryOutActionLog::class, 'type' => 'pillory_out', 'extension' => null];
        yield ['class' => ActionLog\SessionOfferAcceptedActionLog::class, 'type' => 'session_offer_accepted', 'extension' => null];
        yield ['class' => ActionLog\TasksTaskAssignedActionLog::class, 'type' => 'tasks_task_assigned', 'extension' => 'tasks'];
        yield ['class' => ActionLog\TasksTaskCompletedActionLog::class, 'type' => 'tasks_task_completed', 'extension' => 'tasks'];
        yield ['class' => ActionLog\TasksTaskFailedActionLog::class, 'type' => 'tasks_task_failed', 'extension' => 'tasks'];
        yield ['class' => ActionLog\TasksVoteEndedActionLog::class, 'type' => 'tasks_vote_ended', 'extension' => 'tasks'];
        yield ['class' => ActionLog\TemporaryOpeningLockedActionLog::class, 'type' => 'temporary_opening_locked', 'extension' => 'temporary-opening'];
        yield ['class' => ActionLog\TemporaryOpeningLockedLateActionLog::class, 'type' => 'temporary_opening_locked_late', 'extension' => 'temporary-opening'];
        yield ['class' => ActionLog\TemporaryOpeningOpenedActionLog::class, 'type' => 'temporary_opening_opened', 'extension' => 'temporary-opening'];
        yield ['class' => ActionLog\TimerGuessedActionLog::class, 'type' => 'timer_guessed', 'extension' => 'guess-timer'];
        yield ['class' => ActionLog\TimerHiddenActionLog::class, 'type' => 'timer_hidden', 'extension' => null];
        yield ['class' => ActionLog\TimerRevealedActionLog::class, 'type' => 'timer_revealed', 'extension' => null];
        yield ['class' => ActionLog\TimeChangedActionLog::class, 'type' => 'time_changed', 'extension' => null];
        yield ['class' => ActionLog\TimeLogsHiddenActionLog::class, 'type' => 'time_logs_hidden', 'extension' => null];
        yield ['class' => ActionLog\TimeLogsRevealedActionLog::class, 'type' => 'time_logs_revealed', 'extension' => null];
        yield ['class' => ActionLog\UnlockedActionLog::class, 'type' => 'unlocked', 'extension' => null];
        yield ['class' => ActionLog\VerificationPictureSubmittedActionLog::class, 'type' => 'verification_picture_submitted', 'extension' => 'verification-picture'];
        yield ['class' => ActionLog\WheelOfFortuneTurnedActionLog::class, 'type' => 'wheel_of_fortune_turned', 'extension' => 'wheel-of-fortune'];
        yield ['class' => ActionLog\CustomActionLog::class, 'type' => 'custom', 'extension' => null];
    }

    /**
     * @dataProvider provideDiscriminatorType
     *
     * @return void
     */
    public function testDiscriminatorType($class, $type)
    {
        $actionLog = new $class();
        self::assertSame($type, $actionLog->getType());
    }

    /**
     * @dataProvider provideDiscriminatorType
     *
     * @return void
     */
    public function testGetExtension($class, $type, $extension)
    {
        $actionLog = new $class();
        self::assertSame($extension, $actionLog->getExtension());

        if (!is_null($extension)) {
            self::assertInstanceOf(ChasterExtension::class, ChasterExtension::tryNormalizeToEnum($actionLog->getExtension()));
        }
    }
}
