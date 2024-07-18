<?php

namespace Fake\ChasterObjects\Tests\Factory;

use Fake\ChasterObjects\Objects\Extension\Link\Link;
use Zenstruck\Foundry\ObjectFactory;

/**
 * @extends ObjectFactory<Link>
 *
 * @method        Link   create(array|callable $attributes = [])
 * @method static Link   createOne(array $attributes = [])
 * @method static Link[] createMany(int $number, array|callable $attributes = [])
 * @method static Link[] createSequence(iterable|callable $sequence)
 */
final class SharedLinkLinkFactory extends ObjectFactory
{
    public static function class(): string
    {
        return Link::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     */
    protected function defaults(): array|callable
    {
        $link = self::faker()->url();
        return [
            'link' => $link,
        ];
    }
}
