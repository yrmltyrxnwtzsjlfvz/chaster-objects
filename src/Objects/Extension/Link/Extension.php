<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

use Fake\ChasterObjects\Objects\ExtensionParty;

class Extension extends ExtensionParty
{
    /**
     * @var Config|null
     */
    protected $config;

    public function getConfig(): ?Config
    {
        return $this->config;
    }

    /**
     * @param Config|null $config
     *
     * @return $this
     */
    public function setConfig($config): static
    {
        $this->config = $config;

        return $this;
    }
}
