<?php



namespace Tests;

use MisterIcy\ExcelWriter\ExcelWriter;
use MisterIcy\ExcelWriter\Generator\BasicGenerator;
use MisterIcy\ExcelWriter\Handlers\DataHandler;
use MisterIcy\ExcelWriter\Handlers\MetadataHandler;
use MisterIcy\ExcelWriter\Properties\PropertyBuilder;
use MisterIcy\ExcelWriter\Properties\PropertyCollection;
use PHPUnit\Framework\TestCase;

class BasicTest extends TestCase
{
    public function testBasicGenerator()
    {

        $filename = 'testFile.xlsx';

        $generator = new BasicGenerator();

        $generator
            ->setHandler(new MetadataHandler())
            ->setNext(new DataHandler());


        $properties = new PropertyCollection();
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::INT, 'int')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::STRING, 'string')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::BOOLEAN, 'bool')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::INT, null, true, '=CONCATENATE(A{row}, B{row})')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::STRING, null, true, '=IF(A{row} > 10, "YES", "NO")')
        );

        $writer = ExcelWriter::createWriter($generator, $properties);

        $data = [];
        $data[] = new MockObject();
        $data[] = new MockObject();
        $data[] = new MockObject();

        $writer->generateFile($data, $filename);

        self::assertFileExists(sys_get_temp_dir() . "/" . $filename );
    }
}