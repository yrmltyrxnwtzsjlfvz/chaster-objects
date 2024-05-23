<?php

namespace Fake\ChasterObjects\Objects\Lock;

use Fake\ChasterObjects\Objects\Interfaces\LockSessionInterface;
use Fake\ChasterObjects\Objects\Traits\LockIdNormalizerTrait;
use Fake\ChasterObjects\Objects\Traits\LockIdTrait;

class LockId implements LockSessionInterface
{
    use LockIdTrait;
    use LockIdNormalizerTrait;
}
