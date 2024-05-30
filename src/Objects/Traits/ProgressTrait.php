<?php

namespace Fake\ChasterObjects\Objects\Traits;

use BadMethodCallException;
use Bytes\DateBundle\Helpers\DateTimeHelper;
use Bytes\DateBundle\Objects\LargeComparableDateInterval;
use DateInterval;
use DateTime;
use DateTimeInterface;
use DateTimeZone;
use Exception;

trait ProgressTrait
{
    public function getStartToMaxSeconds(?DateTimeInterface $start = null): ?int
    {
        if ($this->hasStartToMaxInterval()) {
            return LargeComparableDateInterval::getTotalSeconds($this->getStartToMaxInterval());
        }

        return null;
    }

    public function hasStartToMaxInterval(): bool
    {
        return $this->limitLockTime && !empty($this->maxLimitDate);
    }

    public function getStartToMaxInterval(): ?DateInterval
    {
        if ($this->hasStartToMaxInterval()) {
            return $this->startDate->diff($this->maxLimitDate);
        }

        return null;
    }

    public function getStartToMaxMinutes(): ?int
    {
        if ($this->hasStartToMaxInterval()) {
            return LargeComparableDateInterval::getTotalMinutes($this->getStartToMaxInterval(), 'ceil');
        }

        return null;
    }

    public function getStartToMaxHours(): ?int
    {
        if ($this->hasStartToMaxInterval()) {
            return LargeComparableDateInterval::getTotalHours($this->getStartToMaxInterval(), 'ceil');
        }

        return null;
    }

    public function getNowToEndSeconds(bool $override = false): ?int
    {
        $interval = $this->getNowToEndInterval($override);
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalSeconds($interval);
    }

    /**
     * @throws Exception
     */
    public function getNowToEndInterval(bool $override = false, ?DateTimeInterface $now = null): ?DateInterval
    {
        if ($this->hasStartToEndInterval($override)) {
            return ($now ?? (new DateTime('now', new DateTimeZone('UTC'))))->diff($this->endDate);
        }

        return null;
    }

    public function hasStartToEndInterval(bool $override = false): bool
    {
        return ($this->isAllowedToViewTime || $override) && !empty($this->endDate);
    }

    public function getNowToEndMinutes(bool $override = false, string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getNowToEndInterval($override);
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalMinutes($interval, $roundingFunc);
    }

    /**
     * @throws Exception
     */
    public function getNowToEndHours(bool $override = false, string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getNowToEndInterval($override);
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalHours($interval, $roundingFunc);
    }

    public function getNowToLesserOfMaxOrEndInterval(?DateTimeInterface $now = null, bool $override = false): ?DateInterval
    {
        $hasStartToMax = $this->hasStartToMaxInterval();
        $hasStartToEnd = $this->hasStartToEndInterval(override: $override);
        if ($hasStartToMax && !$hasStartToEnd) {
            $return = $this->getNowToMaxInterval(now: $now);
        } elseif (!$hasStartToMax && $hasStartToEnd) {
            $return = $this->getNowToEndInterval(override: $override, now: $now);
        } elseif (!($hasStartToMax || $hasStartToEnd)) {
            $return = null;
        } else {
            $startToMax = $this->getNowToMaxInterval(now: $now);
            $startToEnd = $this->getNowToEndInterval(override: $override, now: $now);
            $return = (LargeComparableDateInterval::getTotalSeconds($startToMax) > LargeComparableDateInterval::getTotalSeconds($startToEnd)) ? $startToEnd : $startToMax;
        }

        return $return;
    }

    public function getStartToLesserOfMaxOrEndInterval(?DateInterval $other = null, bool $override = false): ?DateInterval
    {
        $hasStartToMax = $this->hasStartToMaxInterval();
        $hasStartToEnd = $this->hasStartToEndInterval(override: $override);
        if ($hasStartToMax && !$hasStartToEnd) {
            $return = $this->getStartToMaxInterval();
        } elseif (!$hasStartToMax && $hasStartToEnd) {
            $return = $this->getStartToEndInterval(override: $override);
        } elseif (!($hasStartToMax || $hasStartToEnd)) {
            $return = null;
        } else {
            $startToMax = $this->getStartToMaxInterval();
            $startToEnd = $this->getStartToEndInterval(override: $override);
            $return = (LargeComparableDateInterval::getTotalSeconds($startToMax) > LargeComparableDateInterval::getTotalSeconds($startToEnd)) ? $startToEnd : $startToMax;
        }

        if (is_null($other)) {
            return $return;
        }

        return (LargeComparableDateInterval::getTotalSeconds($return) > LargeComparableDateInterval::getTotalSeconds($other)) ? $other : $return;
    }

    public function getStartToEndInterval(bool $override = false): ?DateInterval
    {
        if ($this->hasStartToEndInterval($override)) {
            return $this->startDate->diff($this->endDate);
        }

        return null;
    }

    /**
     * @throws Exception
     */
    public function getProgressPercentage(?DateTimeInterface $now = null): ?float
    {
        if (!$this->hasStartToEndInterval()) {
            return null;
        }

        return round(LargeComparableDateInterval::getTotalSeconds($this->getProgressInterval($now)) / LargeComparableDateInterval::getTotalSeconds($this->getStartToEndInterval()) * 100);
    }

    /**
     * @return DateInterval Interval between the start date and $now
     *
     * @throws Exception
     * @throws BadMethodCallException
     */
    public function getProgressInterval(?DateTimeInterface $now = null): DateInterval
    {
        if (is_null($this->getStartDate())) {
            throw new BadMethodCallException('Start date cannot be null.');
        }

        return $this->startDate->diff($now ?? new DateTime('now', new DateTimeZone('UTC')));
    }

    /**
     * @throws Exception
     */
    public function getProgressToMaxPercentage(?DateTimeInterface $now = null): ?float
    {
        if (!$this->hasStartToMaxInterval()) {
            return null;
        }

        return round(LargeComparableDateInterval::getTotalSeconds($this->getProgressInterval($now)) / LargeComparableDateInterval::getTotalSeconds($this->getStartToMaxInterval()) * 100);
    }

    public function getEndToMaxSeconds(): ?int
    {
        $interval = $this->getEndToMaxInterval();
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalSeconds($interval);
    }

    public function getEndToMaxInterval(): ?DateInterval
    {
        if (!$this->hasStartToMaxInterval()) {
            return null;
        }

        if (empty($this->getEndDate())) {
            return null;
        }

        return $this->getEndDate()->diff($this->getMaxLimitDate());
    }

    public function getNowToMaxSeconds(): ?int
    {
        $interval = $this->getNowToMaxInterval();
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalSeconds($interval);
    }

    public function getNowToMaxInterval(?DateTimeInterface $now = null): ?DateInterval
    {
        if ($this->hasStartToMaxInterval()) {
            if (empty($now)) {
                $now = new DateTime();
                $now->setTimezone(new DateTimeZone('UTC'));
            }

            return $now->diff($this->maxLimitDate);
        }

        return null;
    }

    /**
     * @param string $roundingFunc = ['ceil', 'floor', 'round'][$any]
     */
    public function getNowToMaxHours(?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getNowToMaxInterval($now);
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalHours($interval, $roundingFunc);
    }

    /**
     * @param string $roundingFunc = ['ceil', 'floor', 'round'][$any]
     */
    public function getNowToMaxMinutes(?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getNowToMaxInterval($now);
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalMinutes($interval, $roundingFunc);
    }

    public function getStartToEndSeconds(): int
    {
        if (!$this->hasStartToEndInterval()) {
            return 0;
        }

        $interval = $this->getStartToEndInterval();
        if (empty($interval)) {
            return 0;
        }

        return LargeComparableDateInterval::getTotalSeconds($interval);
    }

    public function getStartToNowHours(?DateTimeInterface $start = null, ?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): int
    {
        return LargeComparableDateInterval::getTotalHours($this->getStartToNowInterval($start, $now), $roundingFunc);
    }

    public function getStartToNowDays(?DateTimeInterface $start = null, ?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): int
    {
        return LargeComparableDateInterval::getTotalDays($this->getStartToNowInterval($start, $now), $roundingFunc);
    }

    public function getStartToNowInterval(?DateTimeInterface $start = null, ?DateTimeInterface $now = null): ?DateInterval
    {
        if (!empty($start)) {
            $start = DateTime::createFromInterface($start)->setTimezone(new DateTimeZone('UTC'));
        } else {
            $start = $this->startDate;
        }

        if (empty($now)) {
            $now = new DateTime();
            $now->setTimezone(new DateTimeZone('UTC'));
        }

        return $start->diff($now);
    }

    public function getStartToNowMinutes(?DateTimeInterface $start = null, ?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): int
    {
        return LargeComparableDateInterval::getTotalMinutes($this->getStartToNowInterval($start, $now), $roundingFunc);
    }

    public function getStartToNowSeconds(?DateTimeInterface $start = null, ?DateTimeInterface $now = null): ?int
    {
        return LargeComparableDateInterval::getTotalSeconds($this->getStartToNowInterval($start, $now));
    }

    public function getStartToUnlockedHours(string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getStartToUnlockedInterval();
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalHours($interval, $roundingFunc);
    }

    public function getStartToUnlockedInterval(): ?DateInterval
    {
        $start = DateTimeHelper::toImmutableUTC($this->startDate);

        if (empty($this->unlockedAt)) {
            return null;
        }

        $unlocked = DateTimeHelper::toImmutableUTC($this->unlockedAt);

        return $start->diff($unlocked);
    }

    public function getStartToUnlockedMinutes(string $roundingFunc = 'ceil'): ?int
    {
        $interval = $this->getStartToUnlockedInterval();
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalMinutes($interval, $roundingFunc);
    }

    public function getStartToUnlockedSeconds(): ?int
    {
        $interval = $this->getStartToUnlockedInterval();
        if (is_null($interval)) {
            return null;
        }

        return LargeComparableDateInterval::getTotalSeconds($interval);
    }
}
