<?php

namespace Fake\ChasterObjects\Objects\Extension\Task\Vote;

class Result
{
    use VoteEndsAtTrait;

    /**
     * @var bool|null
     */
    private $canVote;

    /**
     * @var Task[]|null
     */
    private $choices;

    /**
     * @var mixed|null
     */
    private $selectedChoiceIndex;

    public function getCanVote(): ?bool
    {
        return $this->canVote;
    }

    /**
     * @return $this
     */
    public function setCanVote(?bool $canVote): static
    {
        $this->canVote = $canVote;

        return $this;
    }

    /**
     * @return Task[]|null
     */
    public function getChoices(): ?array
    {
        return $this->choices;
    }

    /**
     * @param Task[]|null $choices
     *
     * @return $this
     */
    public function setChoices(?array $choices): static
    {
        $this->choices = $choices;

        return $this;
    }

    /**
     * @return mixed|null
     */
    public function getSelectedChoiceIndex(): mixed
    {
        return $this->selectedChoiceIndex;
    }

    /**
     * @return $this
     */
    public function setSelectedChoiceIndex(mixed $selectedChoiceIndex): static
    {
        $this->selectedChoiceIndex = $selectedChoiceIndex;

        return $this;
    }
}
