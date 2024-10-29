<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Partner\JigsawPuzzle;

use Bytes\Tests\Common\TestFullSerializerTrait;
use Fake\ChasterObjects\Objects\Extension\Partner\JigsawPuzzle\Config;
use PHPUnit\Framework\TestCase;

class ConfigSerializationTest extends TestCase
{
    use TestFullSerializerTrait;

    public const FIXTURE_FILE = '../../../../fixtures/jigsawpuzzle-config.json';

    /**
     * @var Config
     */
    private $deserialized;

    public function testDeserialize()
    {
        self::assertInstanceOf(Config::class, $this->deserialized);
        self::assertSame('HIDDEN', $this->deserialized->getDisplayMode());
        self::assertSame(80, $this->deserialized->getPieces());
        self::assertSame(310, $this->deserialized->getTimeLimit());
        self::assertTrue($this->deserialized->isTimeLimitActive());
        self::assertCount(2, $this->deserialized->getPunishments());
    }

    public function testReSerialize()
    {
        $serialized = $this->serializer->serialize($this->deserialized, 'json');
        self::assertJsonStringEqualsJsonFile(self::FIXTURE_FILE, $serialized);
    }

    protected function setUp(): void
    {
        $data = file_get_contents(self::FIXTURE_FILE);
        $this->deserialized = $this->serializer->deserialize($data, Config::class, 'json');
    }

    protected function tearDown(): void
    {
        $this->deserialized = null;
    }
}
