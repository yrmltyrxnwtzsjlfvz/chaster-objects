<?php

namespace Fake\ChasterObjects\Tests\Objects\Lock;

use Fake\ChasterObjects\Enums\ReasonPreventingUnlock;
use Fake\ChasterObjects\Objects\Lock\ReasonPreventingUnlocking;
use Fake\ChasterObjects\Tests\Factory\ReasonPreventingUnlockingFactory;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Symfony\Contracts\Translation\TranslatorInterface;
use Zenstruck\Foundry\Test\Factories;

class ReasonPreventingUnlockingTest extends TestCase
{
    use Factories;

    public function testGetSetIcon()
    {
        $object = new ReasonPreventingUnlocking();
        self::assertNull($object->getIcon());
        $object = ReasonPreventingUnlockingFactory::createOne();
        self::assertNotNull($object);
        self::assertStringContainsString('fa-solid fa-', $object->getIcon());
        self::assertStringNotContainsString('fa-solid fa-fa-solid fa-', $object->getIcon());

        $object->setIcon('lock');
        self::assertSame('fa-solid fa-lock', $object->getIcon());
        self::assertStringNotContainsString('fa-solid fa-fa-solid fa-', $object->getIcon());
    }

    /**
     * @dataProvider provideReason
     *
     * @param ?string                 $reason
     * @param ?string                 $expected
     * @param ?ReasonPreventingUnlock $expectedEnum
     *
     * @return void
     */
    public function testGetSetReason($reason, $expected, $expectedEnum)
    {
        $object = new ReasonPreventingUnlocking();
        self::assertNull($object->getReason());
        self::assertNull($object->getReasonEnum());
        self::assertEmpty((string) $object);

        $object->setReason($reason);
        self::assertSame($expected, $object->getReason());
        self::assertSame($expected ?? '', (string) $object);
        self::assertSame($expectedEnum, $object->getReasonEnum());
    }

    public static function provideReason(): Generator
    {
        $faker = Factory::create();
        yield ['reason' => null, 'expected' => null, 'expectedEnum' => null];
        $reason = $faker->text(20);
        yield ['reason' => $reason, 'expected' => $reason, 'expectedEnum' => null];
        $reason = $faker->randomElement(ReasonPreventingUnlock::cases());
        yield ['reason' => $reason->value, 'expected' => $reason->value, 'expectedEnum' => $reason];
        $reason = 'chaster.requirements_to_unlock.'.$faker->word();
        yield ['reason' => $reason, 'expected' => $reason, 'expectedEnum' => null];
    }

    public function testCreate()
    {
        $object = ReasonPreventingUnlockingFactory::createOne();

        $static = ReasonPreventingUnlocking::create(reason: $object->getReason());
        self::assertSame($object->getReason(), $static->getReason());
        self::assertEmpty($static->getIcon());

        $static = ReasonPreventingUnlocking::create(reason: $object->getReason(), icon: $object->getIcon());
        self::assertSame($object->getReason(), $static->getReason());
        self::assertSame($object->getIcon(), $static->getIcon());
        self::assertStringNotContainsString('fa-solid fa-fa-solid fa-', $static->getIcon());
    }

    public function testNormalize()
    {
        $object = ReasonPreventingUnlockingFactory::createOne();

        $static = ReasonPreventingUnlocking::normalize($object);
        self::assertSame($object->getReason(), $static->getReason());
        self::assertSame($object->getIcon(), $static->getIcon());
        self::assertStringNotContainsString('fa-solid fa-fa-solid fa-', $static->getIcon());

        $static = ReasonPreventingUnlocking::normalize($object->getReason());
        self::assertSame($object->getReason(), $static->getReason());
        self::assertEmpty($static->getIcon());
    }

    /**
     * @dataProvider provideTranslatableReason
     *
     * @param ?string $reason
     * @param ?string $expected
     * @param string  $willReturn
     *
     * @return void
     */
    public function testTranslate($reason, $expected, $willReturn)
    {
        $trans = self::createStub(TranslatorInterface::class);
        $trans->method('trans')
            ->willReturn($willReturn);

        $object = ReasonPreventingUnlockingFactory::createOne(['reason' => $reason]);
        $object->translate($trans);
        self::assertSame($expected, $object->getReason());
    }

    public static function provideTranslatableReason(): Generator
    {
        $faker = Factory::create();
        yield ['reason' => null, 'expected' => null, 'willReturn' => ''];
        $reason = $faker->text(20);
        yield ['reason' => $reason, 'expected' => $reason, 'willReturn' => $reason];
        $reason = $faker->randomElement(ReasonPreventingUnlock::cases());
        yield ['reason' => $reason->value, 'expected' => $reason->value, 'willReturn' => $reason->value];
        $word = $faker->word();
        $reason = 'chaster.requirements_to_unlock.'.$word;
        yield ['reason' => $word, 'expected' => $word, 'willReturn' => $word];
    }
}
