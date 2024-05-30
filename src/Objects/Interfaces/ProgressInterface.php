<?php

namespace Fake\ChasterObjects\Objects\Interfaces;

use BadMethodCallException;
use DateInterval;
use DateTimeInterface;
use Exception;

interface ProgressInterface
{
    public function getStartToMaxHours(): ?int;

    public function hasStartToMaxInterval(): bool;

    public function getStartToMaxInterval(): ?DateInterval;

    /**
     * @throws Exception
     */
    public function getNowToEndInterval(bool $override = false): ?DateInterval;

    public function hasStartToEndInterval(bool $override = false): bool;

    public function getNowToLesserOfMaxOrEndInterval(?DateTimeInterface $now = null, bool $override = false): ?DateInterval;

    public function getStartToLesserOfMaxOrEndInterval(?DateInterval $other = null, bool $override = false): ?DateInterval;

    public function getStartToEndInterval(bool $override = false): ?DateInterval;

    /**
     * @throws Exception
     */
    public function getProgressPercentage(?DateTimeInterface $now = null): ?float;

    /**
     * @return DateInterval Interval between the start date and $now
     *
     * @throws Exception
     * @throws BadMethodCallException
     */
    public function getProgressInterval(?DateTimeInterface $now = null): DateInterval;

    /**
     * @throws Exception
     */
    public function getProgressToMaxPercentage(?DateTimeInterface $now = null): ?float;

    public function getEndToMaxSeconds(): ?int;

    public function getEndToMaxInterval(): ?DateInterval;

    public function getNowToMaxSeconds(): ?int;

    public function getNowToMaxInterval(?DateTimeInterface $now = null): ?DateInterval;

    /**
     * @param string $roundingFunc = ['ceil', 'floor', 'round'][$any]
     */
    public function getNowToMaxHours(?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): ?int;

    /**
     * @param string $roundingFunc = ['ceil', 'floor', 'round'][$any]
     */
    public function getNowToMaxMinutes(?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): ?int;

    public function getStartToEndSeconds(): int;

    public function getStartToNowHours(?DateTimeInterface $start = null, ?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): int;

    public function getStartToNowInterval(?DateTimeInterface $start = null, ?DateTimeInterface $now = null): ?DateInterval;

    public function getStartToNowMinutes(?DateTimeInterface $start = null, ?DateTimeInterface $now = null, string $roundingFunc = 'ceil'): int;
}
