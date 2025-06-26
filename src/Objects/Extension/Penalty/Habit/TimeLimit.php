<?php

namespace Fake\ChasterObjects\Objects\Extension\Penalty\Habit;

class TimeLimit extends Habit
{
    private ?int $count = 1;

    public function getCount(): ?int
    {
        return $this->count;
    }

    /**
     * @return $this
     */
    public function setCount(?int $count): static
    {
        $this->count = $count;

        return $this;
    }
}
