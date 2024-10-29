<?php

namespace Fake\ChasterObjects\Tests\Objects\Extension\Partner\FindTheKey1;

use Bytes\Tests\Common\TestFullSerializerTrait;
use Fake\ChasterObjects\Objects\Extension\Partner\FindTheKey1\Config;
use PHPUnit\Framework\TestCase;

class ConfigSerializationTest extends TestCase
{
    use TestFullSerializerTrait;

    public const FIXTURE_FILE = '../../../../fixtures/findthekey1-config.json';

    /**
     * @var Config
     */
    private $deserialized;

    public function testDeserialize()
    {
        self::assertInstanceOf(Config::class, $this->deserialized);
        self::assertSame('-1', $this->deserialized->getUnfairslevel());
        self::assertCount(1, $this->deserialized->getOnstart());
        self::assertCount(2, $this->deserialized->getOncorrect());
        self::assertCount(3, $this->deserialized->getOnwrong());
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
