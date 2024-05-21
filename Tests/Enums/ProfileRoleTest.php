<?php

namespace Fake\ChasterObjects\Tests\Enums;

use Fake\ChasterObjects\Enums\ProfileRole;
use PHPUnit\Framework\TestCase;

class ProfileRoleTest extends TestCase
{
    public function testEnum()
    {
        $this->assertTrue(ProfileRole::KEYHOLDER->equals(ProfileRole::tryNormalizeToEnum('keyholder')));
    }
}
