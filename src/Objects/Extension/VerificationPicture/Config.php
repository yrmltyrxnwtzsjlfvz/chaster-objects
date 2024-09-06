<?php

namespace Fake\ChasterObjects\Objects\Extension\VerificationPicture;

use Fake\ChasterObjects\Enums\VerificationPictureVisibility;
use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Symfony\Component\Validator\Constraints as Assert;

class Config implements ExtensionConfigInterface
{
    private ?VerificationPictureVisibility $visibility = null;

    /**
     * @var PeerVerification|null
     */
    private ?PeerVerification $peerVerification = null;

    public function getVisibility(): ?VerificationPictureVisibility
    {
        return $this->visibility;
    }

    /**
     * @return $this
     */
    public function setVisibility(VerificationPictureVisibility|string|null $visibility): static
    {
        $this->visibility = !is_null($visibility) ? VerificationPictureVisibility::tryNormalizeToEnum($visibility) : null;

        return $this;
    }

    public function getPeerVerification(): ?PeerVerification
    {
        return $this->peerVerification;
    }

    /**
     * @return $this
     */
    public function setPeerVerification(?PeerVerification $peerVerification): static
    {
        $this->peerVerification = $peerVerification;

        return $this;
    }
}
