<?php

namespace Fake\ChasterObjects\Objects\Traits;

use BackedEnum;
use Fake\ChasterObjects\Enums\ChasterExtension;
use Fake\ChasterObjects\Enums\ExtensionMode;

trait ExtensionTrait
{
    /**
     * @var string|null
     */
    private $slug;

    private ?ExtensionMode $mode = null;

    /**
     * @var int|null
     */
    private $regularity;

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @return $this
     */
    public function setSlug(ChasterExtension|string|null $slug): static
    {
        $this->slug = $slug instanceof BackedEnum ? $slug->value : $slug;

        return $this;
    }

    public function getMode(): ?ExtensionMode
    {
        return $this->mode;
    }

    /**
     * @return $this
     */
    public function setMode(ExtensionMode|string|null $mode): static
    {
        $this->mode = ExtensionMode::tryNormalizeToEnum($mode);

        return $this;
    }

    public function getRegularity(): ?int
    {
        return $this->regularity;
    }

    /**
     * @return $this
     */
    public function setRegularity(?int $regularity): static
    {
        $this->regularity = $regularity;

        return $this;
    }
}
