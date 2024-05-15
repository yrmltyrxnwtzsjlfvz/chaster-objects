<?php

namespace Fake\ChasterObjects\Objects\Interfaces;

interface FormattedNameInterface
{
    /**
     * @example Name [ID]
     */
    public function getFormattedName(bool $masked = false): string;
}
