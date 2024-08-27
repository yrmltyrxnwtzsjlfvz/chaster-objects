<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog;

use Fake\ChasterObjects\Objects\Lock\ActionLog\Payload\VerificationPictureSubmittedPayload;

class VerificationPictureSubmittedActionLog extends AbstractActionLog
{
    private ?VerificationPictureSubmittedPayload $payload;

    public function getPayload(): ?VerificationPictureSubmittedPayload
    {
        return $this->payload;
    }

    /**
     * @return $this
     */
    public function setPayload(?VerificationPictureSubmittedPayload $payload): static
    {
        $this->payload = $payload;

        return $this;
    }
}
