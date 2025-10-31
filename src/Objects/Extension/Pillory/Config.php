<?php

namespace Fake\ChasterObjects\Objects\Extension\Pillory;

use Fake\ChasterObjects\Objects\Extension\ExtensionConfigInterface;
use Fake\ChasterObjects\Objects\Traits\TimeToAddLimitUsersTrait;
use Symfony\Component\Serializer\Annotation\SerializedName;

class Config implements ExtensionConfigInterface
{
    use TimeToAddLimitUsersTrait;
}
