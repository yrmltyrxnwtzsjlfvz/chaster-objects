<?php

namespace Fake\ChasterObjects\Objects\Extension\Link;

use Fake\ChasterObjects\Objects\Extension\Link\Interfaces\InfoInterface;
use Fake\ChasterObjects\Objects\Extension\Link\Interfaces\LinkInterface;
use Fake\ChasterObjects\Objects\Extension\Link\Traits\InfoTrait;
use Fake\ChasterObjects\Objects\Extension\Link\Traits\LinkTrait;

/**
 * Helper class that combines the {@see Info} and {@see Link} classes.
 */
class LinkInfo implements InfoInterface, LinkInterface
{
    use InfoTrait;
    use LinkTrait;
}
