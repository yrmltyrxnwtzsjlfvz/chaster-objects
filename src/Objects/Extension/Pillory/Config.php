<?php

namespace Fake\ChasterObjects\Objects\Extension\Pillory;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Fake\ChasterObjects\Objects\Traits\TimeToAddLimitUsersTrait;

class Config implements ExtensionConfigInterface
{
    use TimeToAddLimitUsersTrait;
}
