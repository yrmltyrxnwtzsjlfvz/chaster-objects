<?php

namespace Fake\ChasterObjects\Enums;

use Bytes\EnumSerializerBundle\Enums\StringBackedEnumInterface;
use Bytes\EnumSerializerBundle\Enums\StringBackedEnumTrait;
use UnitEnum;
use function Symfony\Component\String\u;

enum ActionLogType: string implements StringBackedEnumInterface
{
    use StringBackedEnumTrait;

    case COMBINATION_VERIFIED = 'combination_verified';
    case DICE_ROLLED = 'dice_rolled';
    case EXTENSION_DISABLED = 'extension_disabled';
    case EXTENSION_ENABLED = 'extension_enabled';
    case EXTENSION_UPDATED = 'extension_updated';
    case KEYHOLDER_TRUSTED = 'keyholder_trusted';
    case LINKS_LINK_TIME_CHANGED = 'link_time_changed';
    case LOCKED = 'locked';
    case LOCK_FROZEN = 'lock_frozen';
    case LOCK_UNFROZEN = 'lock_unfrozen';
    case MAX_LIMIT_DATE_INCREASED = 'max_limit_date_increased';
    case MAX_LIMIT_DATE_REMOVED = 'max_limit_date_removed';
    case PILLORY_IN = 'pillory_in';
    case PILLORY_OUT = 'pillory_out';
    case SESSION_OFFER_ACCEPTED = 'session_offer_accepted';
    case TASKS_TASK_ASSIGNED = 'tasks_task_assigned';
    case TASKS_TASK_COMPLETED = 'tasks_task_completed';
    case TASKS_TASK_FAILED = 'tasks_task_failed';
    case TASKS_TASK_VOTE_ENDED = 'tasks_vote_ended';
    case TEMPORARY_OPENING_LOCKED = 'temporary_opening_locked';
    case TEMPORARY_OPENING_LOCKED_LATE = 'temporary_opening_locked_late';
    case TEMPORARY_OPENING_OPENED = 'temporary_opening_opened';
    case TIMER_GUESSED = 'timer_guessed';
    case TIMER_HIDDEN = 'timer_hidden';
    case TIMER_REVEALED = 'timer_revealed';
    case TIME_CHANGED = 'time_changed';
    case TIME_LOGS_HIDDEN = 'time_logs_hidden';
    case TIME_LOGS_REVEALED = 'time_logs_revealed';
    case UNLOCKED = 'unlocked';
    case VERIFICATION_PICTURE_SUBMITTED = 'verification_picture_submitted';
    case WHEEL_OF_FORTUNE_TURNED = 'wheel_of_fortune_turned';
    case CUSTOM = 'custom';

    public static function provideQueueActionsFormChoices()
    {
        return [
            ActionLogType::getFormChoiceKey(ActionLogType::TIME_CHANGED) => ActionLogType::getFormChoiceValue(ActionLogType::TIME_CHANGED),
            ActionLogType::getFormChoiceKey(ActionLogType::LOCK_UNFROZEN) => ActionLogType::getFormChoiceValue(ActionLogType::LOCK_UNFROZEN),
            ActionLogType::getFormChoiceKey(ActionLogType::LOCK_FROZEN) => ActionLogType::getFormChoiceValue(ActionLogType::LOCK_FROZEN),
            ActionLogType::getFormChoiceKey(ActionLogType::PILLORY_IN) => ActionLogType::getFormChoiceValue(ActionLogType::PILLORY_IN),
            ActionLogType::getFormChoiceKey(ActionLogType::TASKS_TASK_ASSIGNED) => ActionLogType::getFormChoiceValue(ActionLogType::TASKS_TASK_ASSIGNED),
            ActionLogType::getFormChoiceKey(ActionLogType::EXTENSION_UPDATED) => ActionLogType::getFormChoiceValue(ActionLogType::EXTENSION_UPDATED),
            ActionLogType::getFormChoiceKey(ActionLogType::TIMER_HIDDEN) => ActionLogType::getFormChoiceValue(ActionLogType::TIMER_HIDDEN),
            ActionLogType::getFormChoiceKey(ActionLogType::TIMER_REVEALED) => ActionLogType::getFormChoiceValue(ActionLogType::TIMER_REVEALED),
        ];
    }

    public static function getFormChoiceKey(UnitEnum $value): string
    {
        switch ($value) {
            case ActionLogType::TASKS_TASK_FAILED:
                return 'Task failed';
                break;
            case ActionLogType::TASKS_TASK_ASSIGNED:
                return 'Task assigned';
                break;
            case ActionLogType::TASKS_TASK_COMPLETED:
                return 'Task completed';
                break;
            default:
                return u($value->name)->lower()->replace('_', ' ')->title(true)->toString();
                break;
        }
    }

    /**
     * @return ActionLogType[]
     */
    public static function getTasks(): array
    {
        return [
            ActionLogType::TASKS_TASK_ASSIGNED,
            ActionLogType::TASKS_TASK_COMPLETED,
            ActionLogType::TASKS_TASK_FAILED,
            ActionLogType::TASKS_TASK_VOTE_ENDED,
        ];
    }
}
