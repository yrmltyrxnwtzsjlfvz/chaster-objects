<?php

namespace Fake\ChasterObjects\Objects\Extension\Penalty;

use Fake\ChasterObjects\Enums\ChasterKeyholderActions;
use JsonSerializable;

class Punishment implements JsonSerializable
{
    /**
     * @var string|null
     */
    private $name;

    private $params;

    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return $this
     */
    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getParams()
    {
        return $this->params;
    }

    /**
     * @return $this
     */
    public function setParams($params): static
    {
        $this->params = $params;

        return $this;
    }

    public static function create(ChasterKeyholderActions|string $name, ?int $length = null, ?string $reason = null): static
    {
        $static = new static();
        $static->setName($name instanceof ChasterKeyholderActions ? $name->value : $name);
        if (!empty($length)) {
            $static->setParams([
                'duration' => $length,
                'reason' => $reason,
            ]);
        }

        return $static;
    }

    /**
     * @see https://php.net/manual/en/jsonserializable.jsonserialize.php
     */
    public function jsonSerialize(): mixed
    {
        $return['name'] = $this->getName();
        if (!empty($this->getParams())) {
            $return['params'] = $this->getParams();
        }

        return $return;
    }
}
