<?php
namespace Format;

use PHPUnit_Framework_TestCase;
use Exception;

class FormatSizeTest extends PHPUnit_Framework_TestCase
{
    /** @var FormatSize */
    protected $formatSize;

    protected function setUp()
    {
        parent::setUp();

        $this->formatSize = new FormatSize();
    }

    /**
     * @throws Exception
     */
    public function testFormatBytes()
    {
        $bytes = 4398046511104;
        $decimals = 2;
        $formatted = $this->formatSize->formatBytes($bytes, $decimals);
        $this->assertEquals('4.00 TB', $formatted);

        $bytes = 5100273664;
        $decimals = 4;
        $formatted = $this->formatSize->formatBytes($bytes, $decimals);
        $this->assertEquals('4.7500 GB', $formatted);

        $bytes = 33554432;
        $decimals = 2;
        $formatted = $this->formatSize->formatBytes($bytes, $decimals);
        $this->assertEquals('32.00 MB', $formatted);

        $bytes = -2044;
        $formatted = $this->formatSize->formatBytes($bytes);
        $this->assertEquals('-2.00 KB', $formatted);

        $bytes = 0;
        $decimals = 0;
        $formatted = $this->formatSize->formatBytes($bytes, $decimals);
        $this->assertEquals('0 B', $formatted);

        $bytes = 1024;
        $decimals = -2;
        try {
            $this->formatSize->formatBytes($bytes, $decimals);
            $this->fail('Expected Exception was not raised');
        } catch (Exception $e) {
            $this->assertEquals($e->getMessage(), 'Negative decimals are invalid: '.$decimals);
        }
    }
}
