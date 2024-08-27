<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

use Symfony\Component\Serializer\Attribute\SerializedName;

class TaskCompletionPayload extends TaskPayload
{
    #[SerializedName('points')]
    private ?int $pointsEarned = null;

    public function getPointsEarned(): ?int
    {
        return $this->pointsEarned;
    }

    /**
     * @return $this
     */
    public function setPointsEarned(?int $pointsEarned): static
    {
        $this->pointsEarned = $pointsEarned;

        return $this;
    }
}
