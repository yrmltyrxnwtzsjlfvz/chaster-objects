<?php

namespace Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;

use Symfony\Component\Serializer\Attribute\Context;
use Symfony\Component\Serializer\Attribute\SerializedName;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;

#[Context([AbstractObjectNormalizer::SKIP_NULL_VALUES => true])]
class StartupUnfairSetting
{
    #[SerializedName('unabletoguess')]
    private ?int $unableToGuess = null;

    #[SerializedName('delayactions')]
    private ?int $delayActions = null;

    #[SerializedName('hidekeys')]
    private ?int $hideKeys = null;

    #[SerializedName('doubleactions')]
    private ?int $doubleActions = null;

    #[SerializedName('twins')]
    private ?int $twins = null;

    #[SerializedName('nocorrectkey')]
    private ?int $noCorrectKey = null;

    #[SerializedName('liecorrect')]
    private ?int $lieCorrect = null;

    #[SerializedName('blocktime')]
    private ?int $blockTime = null;

    #[SerializedName('blocktime_time')]
    private ?int $blockTimeTime = null;

    #[SerializedName('delayactions_time')]
    private ?int $delayActionsTime = null;

    #[SerializedName('blockverification')]
    private ?int $blockVerification = null;

    #[SerializedName('blockjigsaw_complete')]
    private ?int $blockJigsawComplete = null;

    #[SerializedName('blockshared_link')]
    private ?int $blockSharedLink = null;

    #[SerializedName('blockturn_wheel_of_fortune')]
    private ?int $blockTurnWheelOfFortune = null;

    #[SerializedName('blocktask_completed')]
    private ?int $blockTaskCompleted = null;

    #[SerializedName('blocktask_failed')]
    private ?int $blockTaskFailed = null;

    public function getUnableToGuess(): ?int
    {
        return $this->unableToGuess;
    }

    public function getDelayActions(): ?int
    {
        return $this->delayActions;
    }

    public function getHideKeys(): ?int
    {
        return $this->hideKeys;
    }

    public function getDoubleActions(): ?int
    {
        return $this->doubleActions;
    }

    public function getTwins(): ?int
    {
        return $this->twins;
    }

    public function getNoCorrectKey(): ?int
    {
        return $this->noCorrectKey;
    }

    public function getLieCorrect(): ?int
    {
        return $this->lieCorrect;
    }

    public function getBlockTime(): ?int
    {
        return $this->blockTime;
    }

    public function getBlockTimeTime(): ?int
    {
        return $this->blockTimeTime;
    }

    public function getDelayActionsTime(): ?int
    {
        return $this->delayActionsTime;
    }

    public function getBlockVerification(): ?int
    {
        return $this->blockVerification;
    }

    public function getBlockJigsawComplete(): ?int
    {
        return $this->blockJigsawComplete;
    }

    public function getBlockSharedLink(): ?int
    {
        return $this->blockSharedLink;
    }

    public function getBlockTurnWheelOfFortune(): ?int
    {
        return $this->blockTurnWheelOfFortune;
    }

    public function getBlockTaskCompleted(): ?int
    {
        return $this->blockTaskCompleted;
    }

    public function getBlockTaskFailed(): ?int
    {
        return $this->blockTaskFailed;
    }

    /**
     * @return $this
     */
    public function setUnableToGuess(?int $unableToGuess): static
    {
        $this->unableToGuess = $unableToGuess;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDelayActions(?int $delayActions): static
    {
        $this->delayActions = $delayActions;

        return $this;
    }

    /**
     * @return $this
     */
    public function setHideKeys(?int $hideKeys): static
    {
        $this->hideKeys = $hideKeys;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDoubleActions(?int $doubleActions): static
    {
        $this->doubleActions = $doubleActions;

        return $this;
    }

    /**
     * @return $this
     */
    public function setTwins(?int $twins): static
    {
        $this->twins = $twins;

        return $this;
    }

    /**
     * @return $this
     */
    public function setNoCorrectKey(?int $noCorrectKey): static
    {
        $this->noCorrectKey = $noCorrectKey;

        return $this;
    }

    /**
     * @return $this
     */
    public function setLieCorrect(?int $lieCorrect): static
    {
        $this->lieCorrect = $lieCorrect;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockTime(?int $blockTime): static
    {
        $this->blockTime = $blockTime;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockTimeTime(?int $blockTimeTime): static
    {
        $this->blockTimeTime = $blockTimeTime;

        return $this;
    }

    /**
     * @return $this
     */
    public function setDelayActionsTime(?int $delayActionsTime): static
    {
        $this->delayActionsTime = $delayActionsTime;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockVerification(?int $blockVerification): static
    {
        $this->blockVerification = $blockVerification;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockJigsawComplete(?int $blockJigsawComplete): static
    {
        $this->blockJigsawComplete = $blockJigsawComplete;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockSharedLink(?int $blockSharedLink): static
    {
        $this->blockSharedLink = $blockSharedLink;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockTurnWheelOfFortune(?int $blockTurnWheelOfFortune): static
    {
        $this->blockTurnWheelOfFortune = $blockTurnWheelOfFortune;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockTaskCompleted(?int $blockTaskCompleted): static
    {
        $this->blockTaskCompleted = $blockTaskCompleted;

        return $this;
    }

    /**
     * @return $this
     */
    public function setBlockTaskFailed(?int $blockTaskFailed): static
    {
        $this->blockTaskFailed = $blockTaskFailed;

        return $this;
    }
}
