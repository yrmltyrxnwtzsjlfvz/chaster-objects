<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use Bytes\Tests\Common\TestFullValidatorTrait;
use Fake\ChasterObjects\Objects\Lock\LockId;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Exception\ValidationFailedException;

/**
 * @see LockId
 */
class LockIdTest extends TestCase
{
    use TestFullValidatorTrait;
    use TestLockIdNormalizationTrait;

    public function testLockId()
    {
        $lock = new LockId();
        $this->assertNull($lock->getLockId());

        $lock->setLockId('abc123');
        $this->assertEquals('abc123', $lock->getLockId());
        $this->assertEquals(1, $this->validate($lock));
    }

    public function testLockIdBlankLockId()
    {
        $lock = new LockId();

        $lock->setLockId('');

        $this->expectException(ValidationFailedException::class);

        $this->assertEquals(1, $this->validate($lock));
    }
}
