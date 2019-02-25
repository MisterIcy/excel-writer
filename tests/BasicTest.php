<?php



namespace Tests;

use MisterIcy\ExcelWriter\ExcelWriter;
use MisterIcy\ExcelWriter\Generator\BasicGenerator;
use MisterIcy\ExcelWriter\Handlers\MetadataHandler;
use MisterIcy\ExcelWriter\Properties\PropertyCollection;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testBasicGenerator()
    {
        $filename = 'testFile.xlsx';

        $metaDataHandler = new MetadataHandler();

        $generator = new BasicGenerator();
        $generator->setHandler($metaDataHandler);

        $properties = new PropertyCollection();

        $writer = ExcelWriter::createWriter($generator, $properties);

        $writer->generateFile($filename);

        self::assertFileExists(sys_get_temp_dir() . "/" . $filename );
    }
}