<?php

namespace Fake\ChasterObjects\Tests\Factory;

use Fake\ChasterObjects\Enums\ReasonPreventingUnlock;
use Fake\ChasterObjects\Objects\Lock\ReasonPreventingUnlocking;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<ReasonPreventingUnlocking>
 *
 * @method        ReasonPreventingUnlocking   create(array|callable $attributes = [])
 * @method static ReasonPreventingUnlocking   createOne(array $attributes = [])
 * @method static ReasonPreventingUnlocking[] createMany(int $number, array|callable $attributes = [])
 * @method static ReasonPreventingUnlocking[] createSequence(iterable|callable $sequence)
 */
final class ReasonPreventingUnlockingFactory extends ObjectFactory
{
    public static function class(): string
    {
        return ReasonPreventingUnlocking::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'icon' => self::faker()->word(),
            'reason' => self::faker()->randomElement([
                self::faker()->randomElement(ReasonPreventingUnlock::values()),
                self::faker()->text(20),
                'chaster.requirements_to_unlock.'.self::faker()->word(),
            ]),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(ReasonPreventingUnlocking $reasonPreventingUnlocking): void {})
        ;
    }
}
