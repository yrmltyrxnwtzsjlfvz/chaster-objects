<?php

namespace Fake\ChasterObjects\Tests\Objects\SharedLockTags;

use Fake\ChasterFactory\Factory\SharedLockTagFactory;
use Fake\ChasterObjects\Objects\SharedLockTags\SharedLockTag;
use Faker\Factory;
use Generator;
use Illuminate\Support\Arr;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class SharedLockTagTest extends TestCase
{
    use Factories;

    public static function provideGetSetName(): Generator
    {
        $faker = Factory::create();
        yield [$faker->unique()->word()];
        yield [$faker->unique()->word()];
        yield [$faker->unique()->word()];
        yield [$faker->unique()->word()];
    }

    /**
     * @dataProvider provideGetSetName
     *
     * @return void
     */
    public function testGetSetName($name)
    {
        $tag = new SharedLockTag();
        self::assertNull($tag->getName());

        self::assertInstanceOf(SharedLockTag::class, $tag->setName($name));
        self::assertSame($name, $tag->getName());
    }

    public function testNames()
    {
        $tags = SharedLockTagFactory::createMany(10);
        self::assertCount(10, $tags);

        $strings = array_values(array_unique(Arr::map($tags, function (SharedLockTag $tag) {
            return $tag->getName();
        })));

        self::assertCount(10, $strings);
    }
}
