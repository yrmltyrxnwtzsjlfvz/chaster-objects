<?php

namespace Fake\ChasterObjects\Objects\Extension\Link\Interfaces;

use Fake\ChasterObjects\Objects\Extension\Link\Info;

interface InfoInterface
{
    /**
     * @return $this
     */
    public function setVote(?bool $vote): static;

    public function getMinVotes(): ?int;

    /**
     * @return $this
     */
    public function setMinVotes(?int $minVotes): static;

    public function getVotes(): ?int;

    /**
     * @return $this
     */
    public function setVotes(?int $votes): static;

    /**
     * @return $this
     */
    public function setFromInfo(Info|bool|null $vote, ?int $minVotes = null, ?int $votes = null): static;

    public static function createFromInfo(Info|bool|null $vote, ?int $minVotes = null, ?int $votes = null): static;
}
