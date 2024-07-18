<?php

namespace Fake\ChasterObjects\Tests\Factory;

use Fake\ChasterObjects\Objects\Extension\Link\LinkInfo;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<LinkInfo>
 *
 * @method        LinkInfo   create(array|callable $attributes = [])
 * @method static LinkInfo   createOne(array $attributes = [])
 * @method static LinkInfo[] createMany(int $number, array|callable $attributes = [])
 * @method static LinkInfo[] createSequence(iterable|callable $sequence)
 */
final class SharedLinkLinkInfoFactory extends ObjectFactory
{
    public static function class(): string
    {
        return LinkInfo::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        $vote = self::faker()->boolean();
        $minVotes = self::faker()->numberBetween(0, 999);
        $votes = self::faker()->numberBetween(0, 999);

        $link = self::faker()->url();

        return [
            'vote' => $vote,
            'minVotes' => $minVotes,
            'votes' => $votes,
            'link' => $link,
        ];
    }
}
