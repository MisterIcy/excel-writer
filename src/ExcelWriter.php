<?php


namespace MisterIcy\ExcelWriter;

use MisterIcy\ExcelWriter\Generator\AbstractGenerator;
use MisterIcy\ExcelWriter\Generator\BasicGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;
use MisterIcy\ExcelWriter\Properties\PropertyCollection;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Class ExcelWriter
 * @package MisterIcy\ExcelWriter
 */
final class ExcelWriter
{
    /** @var PropertyCollection */
    private $properties;

    /**
     * @return PropertyCollection
     */
    public function getProperties(): PropertyCollection
    {
        return $this->properties;
    }

    /**
     * @return GeneratorInterface
     */
    public function getGenerator(): GeneratorInterface
    {
        return $this->generator;
    }

    /** @var GeneratorInterface */
    private $generator;

    public static function createWriter(
        GeneratorInterface $generator = null,
        PropertyCollection $properties = null
    ) : self
    {
        return new self($generator, $properties);
    }
    private function __construct(
        GeneratorInterface $generator = null,
        PropertyCollection $properties = null
    )
    {
        if (is_null($generator)) {
            /** Default generator is the basic one */
            $this->generator = new BasicGenerator();
        } else {
            $this->generator = $generator;
        }
        if (is_null($properties)) {
            $this->properties = new PropertyCollection();
        } else {
            $this->properties = $properties;
        }
    }

    /**
     * @return Spreadsheet
     */
    public function generateSpreadsheet() : Spreadsheet
    {
        /** @var AbstractGenerator $generator */
        $generator = $this->generator->generate();

        return $generator->getSpreadsheet();

    }

    public function generateFile(string $filename = null) : \SplFileObject
    {
        $spreadsheet = $this->generateSpreadsheet();

        $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');

        if (is_null($filename)) {
            $filename = uniqid() . ".xlsx";
        }

        $path = sys_get_temp_dir() . "/" . $filename;

        $writer->save($path);

        return new \SplFileObject($path, 'r');
    }
}