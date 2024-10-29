<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

#[Context([AbstractObjectNormalizer::SKIP_NULL_VALUES => true])]
class StartupUnfairs
{
    private ?string $type = null;

    private ?int $guess = null;

    #[SerializedName('guessmin')]
    private ?int $guessMin = null;

    #[SerializedName('guessmax')]
    private ?int $guessMax = null;

    private ?int $time = null;

    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return $this
     */
    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getGuess(): ?int
    {
        return $this->guess;
    }

    /**
     * @return $this
     */
    public function setGuess(?int $guess): static
    {
        $this->guess = $guess;

        return $this;
    }

    public function getGuessMin(): ?int
    {
        return $this->guessMin;
    }

    /**
     * @return $this
     */
    public function setGuessMin(?int $guessMin): static
    {
        $this->guessMin = $guessMin;

        return $this;
    }

    public function getGuessMax(): ?int
    {
        return $this->guessMax;
    }

    /**
     * @return $this
     */
    public function setGuessMax(?int $guessMax): static
    {
        $this->guessMax = $guessMax;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    /**
     * @return $this
     */
    public function setTime(?int $time): static
    {
        $this->time = $time;

        return $this;
    }
}
