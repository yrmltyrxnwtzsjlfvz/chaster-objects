<?php

namespace Fake\ChasterObjects\Objects\Extension\VerificationPicture;

use DateTimeInterface;

class UserData
{
    /**
     * @var DateTimeInterface|null
     */
    private $requestedAt;

    /**
     * @var string|null
     */
    private $currentVerificationCode;

    public function getRequestedAt(): ?DateTimeInterface
    {
        return $this->requestedAt;
    }

    /**
     * @return $this
     */
    public function setRequestedAt(?DateTimeInterface $requestedAt): static
    {
        $this->requestedAt = $requestedAt;

        return $this;
    }

    public function getCurrentVerificationCode(): ?string
    {
        return $this->currentVerificationCode;
    }

    /**
     * @return $this
     */
    public function setCurrentVerificationCode(?string $currentVerificationCode): static
    {
        $this->currentVerificationCode = $currentVerificationCode;

        return $this;
    }
}
