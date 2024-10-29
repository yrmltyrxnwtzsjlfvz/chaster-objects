<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

#[Context([AbstractObjectNormalizer::SKIP_NULL_VALUES => true])]
class StartupUnfairSettings
{
    private ?StartupUnfairSetting $default = null;

    private ?StartupUnfairSetting $user = null;

    public function getDefault(): ?StartupUnfairSetting
    {
        return $this->default;
    }

    public function getUser(): ?StartupUnfairSetting
    {
        return $this->user;
    }

    /**
     * @return $this
     */
    public function setDefault(?StartupUnfairSetting $default): static
    {
        $this->default = $default;

        return $this;
    }

    /**
     * @return $this
     */
    public function setUser(?StartupUnfairSetting $user): static
    {
        $this->user = $user;

        return $this;
    }
}
