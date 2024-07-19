<?php

namespace Fake\ChasterObjects\Tests\Factory;

use Fake\ChasterObjects\Objects\SharedLockTags\SharedLockTag;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<SharedLockTag>
 *
 * @method        SharedLockTag   create(array|callable $attributes = [])
 * @method static SharedLockTag   createOne(array $attributes = [])
 * @method static SharedLockTag[] createMany(int $number, array|callable $attributes = [])
 * @method static SharedLockTag[] createSequence(iterable|callable $sequence)
 */
final class SharedLockTagFactory extends ObjectFactory
{
    public static function class(): string
    {
        return SharedLockTag::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        return [
            'name' => self::faker()->unique()->word(),
        ];
    }
}
