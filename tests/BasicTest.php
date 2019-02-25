<?php



namespace Tests;

use MisterIcy\ExcelWriter\ExcelWriter;
use MisterIcy\ExcelWriter\Generator\BasicGenerator;
use MisterIcy\ExcelWriter\Handlers\DataHandler;
use MisterIcy\ExcelWriter\Handlers\FormatHandler;
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
            ->setNext(new FormatHandler())
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
            PropertyBuilder::createProperty(PropertyBuilder::FLOAT, 'float')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::INT, null, true, '=CONCATENATE(A{row}, B{row})')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::STRING, null, true, '=IF(A{row} > 10, "YES", "NO")')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::CURRENCY, null, true, '=A{row}+D{row}')
        );

        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::DATE, 'dateTime')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::DATETIME, 'dateTime')
        );
        $properties->addProperty(
            PropertyBuilder::createProperty(PropertyBuilder::TIME, 'dateTime')
        );




        $writer = ExcelWriter::createWriter($generator, $properties);

        $data = [];
        for ($i=0 ; $i< 10; $i++) {
            $data[] = new MockObject();
        }

        $writer->generateFile($data, $filename);

        self::assertFileExists(sys_get_temp_dir() . "/" . $filename );
    }
}