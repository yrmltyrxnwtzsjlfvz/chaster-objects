<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\WheelOfFortune;

use Fake\ChasterFactory\Factory\SegmentFactory;
use Fake\ChasterObjects\Enums\WheelOfFortuneSegmentType;
use Fake\ChasterObjects\Objects\Extension\WheelOfFortune\Segment;
use Faker\Factory;
use Generator;
use PHPUnit\Framework\TestCase;
use Zenstruck\Foundry\Test\Factories;

class SegmentTest extends TestCase
{
    use Factories;

    public static function provideIsText(): Generator
    {
        yield ['segment' => (new Segment())->setType(WheelOfFortuneSegmentType::TEXT), 'expected' => true];
        yield ['segment' => (new Segment())->setType(WheelOfFortuneSegmentType::PILLORY), 'expected' => false];
    }

    public function testGetType()
    {
        $segment = SegmentFactory::createOne(['type' => WheelOfFortuneSegmentType::PILLORY]);
        self::assertSame(WheelOfFortuneSegmentType::PILLORY, $segment->getType());
    }

    public function testGetSetType()
    {
        $segment = new Segment();
        self::assertNull($segment->getType());
        self::assertInstanceOf(Segment::class, $segment->setType(WheelOfFortuneSegmentType::PILLORY));
        self::assertSame(WheelOfFortuneSegmentType::PILLORY, $segment->getType());
    }

    /**
     * @dataProvider provideIsText
     *
     * @return void
     */
    public function testIsText($segment, $expected)
    {
        self::assertSame($expected, $segment->isText());
    }

    public function testGetText()
    {
        $text = Factory::create()->sentence();
        $segment = SegmentFactory::createOne(['type' => WheelOfFortuneSegmentType::TEXT, 'text' => $text]);
        self::assertSame($text, $segment->getText());
    }

    public function testGetSetText()
    {
        $text = Factory::create()->sentence();
        $segment = new Segment();
        self::assertNull($segment->getText());
        self::assertInstanceOf(Segment::class, $segment->setText($text));
        self::assertSame($text, $segment->getText());
    }
}
