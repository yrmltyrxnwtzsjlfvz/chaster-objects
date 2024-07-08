<?php

namespace Fake\ChasterObjects\Objects\Lock;

use Fake\ChasterObjects\Enums\ReasonPreventingUnlock;
use Symfony\Contracts\Translation\TranslatorInterface;

class ReasonPreventingUnlocking
{
    /**
     * @var string|null
     */
    private $reason;

    /**
     * @var string|null
     */
    private $icon;

    public function __toString(): string
    {
        return $this->getReason();
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function getReasonEnum(): ?ReasonPreventingUnlock
    {
        return ReasonPreventingUnlock::tryFrom($this->reason);
    }

    /**
     * @return $this
     */
    public function setReason(?string $reason): static
    {
        $this->reason = $reason;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    /**
     * @return $this
     */
    public function setIcon(?string $icon): static
    {
        $this->icon = !empty($icon) ? 'fa-solid fa-'.$icon : $icon;

        return $this;
    }

    public static function create(string $reason, ?string $icon = null): static
    {
        $static = new static();

        return $static->setReason($reason)
            ->setIcon($icon ?? '');
    }

    public static function normalize(ReasonPreventingUnlocking|string $message): static
    {
        return $message instanceof ReasonPreventingUnlocking ? $message : static::create(reason: $message);
    }

    public function translate(TranslatorInterface $translator, array $parameters = [], ?string $domain = null, ?string $locale = null): self
    {
        $id = 'chaster.requirements_to_unlock.'.$this->getReason();
        $translation = $translator->trans(id: $id, parameters: $parameters, domain: $domain, locale: $locale);
        if ($translation === $id) {
            $translation = $this->getReason();
        }

        return $this->setReason($translation);
    }
}
