<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Partner;

use Fake\ChasterObjects\Enums\HomeAction as HomeActionEnum;
use Fake\ChasterObjects\Objects\Extension\Partner\HomeAction;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;

class HomeActionTest extends TestCase
{
    public static function provideCreate(): Generator
    {
        $faker = Factory::create();
        $slug = $faker->randomElement(HomeActionEnum::cases());
        $title = $faker->sentence();
        $description = $faker->paragraph();
        $icon = $faker->word();
        $badge = (string) $faker->randomDigit();

        yield ['slug' => $slug, 'expectedSlug' => $slug->value, 'title' => $title, 'description' => $description, 'icon' => $icon, 'badge' => $badge, 'expectedBadge' => $badge];
        yield ['slug' => $slug->value, 'expectedSlug' => $slug->value, 'title' => $title, 'description' => $description, 'icon' => $icon, 'badge' => $badge, 'expectedBadge' => $badge];
        yield ['slug' => $slug, 'expectedSlug' => $slug->value, 'title' => $title, 'description' => $description, 'icon' => $icon, 'badge' => null, 'expectedBadge' => ''];
        yield ['slug' => $slug->value, 'expectedSlug' => $slug->value, 'title' => $title, 'description' => $description, 'icon' => $icon, 'badge' => null, 'expectedBadge' => ''];
    }

    /**
     * @dataProvider provideCreate
     *
     * @return void
     */
    public function testCreate($slug, $expectedSlug, $title, $description, $icon, $badge, $expectedBadge)
    {
        $object = HomeAction::create($slug, $title, $description, $icon, $badge);

        self::assertSame($expectedSlug, $object->getSlug());
        self::assertSame($title, $object->getTitle());
        self::assertSame($description, $object->getDescription());
        self::assertSame($icon, $object->getIcon());
        self::assertSame($expectedBadge, $object->getBadge());
    }

    public function testGetSetDescription()
    {
        $object = new HomeAction();

        $description = Factory::create()->sentence();

        self::assertNull($object->getDescription());

        self::assertInstanceOf(HomeAction::class, $object->setDescription($description));
        self::assertSame($description, $object->getDescription());
    }

    public function testGetSetTitle()
    {
        $object = new HomeAction();

        $title = Factory::create()->sentence();

        self::assertNull($object->getTitle());

        self::assertInstanceOf(HomeAction::class, $object->setTitle($title));
        self::assertSame($title, $object->getTitle());
    }

    public function testGetSetIcon()
    {
        $object = new HomeAction();

        $icon = Factory::create()->word();

        self::assertNull($object->getIcon());

        self::assertInstanceOf(HomeAction::class, $object->setIcon($icon));
        self::assertSame($icon, $object->getIcon());
    }

    /**
     * @dataProvider provideBadge
     *
     * @return void
     */
    public function testGetSetBadge($badge, $expectedBadge)
    {
        $object = new HomeAction();

        self::assertNull($object->getBadge());

        self::assertInstanceOf(HomeAction::class, $object->setBadge($badge));
        self::assertSame($expectedBadge, $object->getBadge());
    }

    public function provideBadge(): Generator
    {
        yield ['badge' => '1', 'expectedBadge' => '1'];
        yield ['badge' => 1, 'expectedBadge' => '1'];
        yield ['badge' => null, 'expectedBadge' => ''];
        yield ['badge' => '', 'expectedBadge' => ''];
    }

    public function testGetSetSlug()
    {
        $object = new HomeAction();

        $slug = Factory::create()->word();

        self::assertNull($object->getSlug());

        self::assertInstanceOf(HomeAction::class, $object->setSlug($slug));
        self::assertSame($slug, $object->getSlug());
    }
}
