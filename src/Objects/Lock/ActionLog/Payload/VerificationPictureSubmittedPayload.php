<?php

namespace Fake\ChasterObjects\Objects\Lock\ActionLog\Payload;

class VerificationPictureSubmittedPayload
{
    private ?string $verificationCode = null;

    private ?string $imageFile = null;

    public function getVerificationCode(): ?string
    {
        return $this->verificationCode;
    }

    /**
     * @return $this
     */
    public function setVerificationCode(?string $verificationCode): static
    {
        $this->verificationCode = $verificationCode;

        return $this;
    }

    public function getImageFile(): ?string
    {
        return $this->imageFile;
    }

    /**
     * @return $this
     */
    public function setImageFile(?string $imageFile): static
    {
        $this->imageFile = $imageFile;

        return $this;
    }
}
