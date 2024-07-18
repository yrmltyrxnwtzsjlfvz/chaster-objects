<?php

namespace Fake\ChasterObjects\Tests\Factory;

use Fake\ChasterObjects\Objects\Extension\Link\Info;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Info>
 *
 * @method        Info   create(array|callable $attributes = [])
 * @method static Info   createOne(array $attributes = [])
 * @method static Info[] createMany(int $number, array|callable $attributes = [])
 * @method static Info[] createSequence(iterable|callable $sequence)
 */
final class SharedLinkInfoFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Info::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        $vote = self::faker()->boolean();
        $minVotes = self::faker()->numberBetween(0, 999);
        $votes = self::faker()->numberBetween(0, 999);
        return [
            'vote' => $vote,
            'minVotes' => $minVotes,
            'votes' => $votes,
        ];
    }
}
