<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Handlers;

use MisterIcy\ExcelWriter\Generator\AbstractGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;
use MisterIcy\ExcelWriter\Properties\AbstractProperty;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/**
 * Class DataHandler - Reference Implementation
 * @package MisterIcy\ExcelWriter\Handlers
 */
final class DataHandler extends AbstractHandler
{
    /**
     * @param AbstractGenerator $generator
     * @return HandlerInterface
     */
    public function handle(GeneratorInterface $generator)
    {
        $spreadsheet = $generator->getSpreadsheet();
        $properties = $generator->getProperties();
        $data = $generator->getData();

        $row = 2;
        $column = 1;

        foreach ($data as $object) {
            /** @var AbstractProperty $property */
            foreach ($properties->getProperties() as $property) {
                $value = $property->renderProperty($object);
                if ($property->isFormula()) {
                    $value = str_replace("{row}", strval($row), $value);
                    $value = str_replace("{col}", Coordinate::stringFromColumnIndex($column), $value);

                    $matches = [];
                    preg_match_all("/\[(.*?)\]/", $value, $matches, PREG_UNMATCHED_AS_NULL);

                    if (count($matches) > 0) {
                        if (count($matches[0]) === 0 && count($matches[1]) === 0) {
                            continue;
                        }
                    }
                    foreach ($matches[1] as $match) {
                        $propColumn = $properties->getExcelColumnOfPropertyPath($match);
                        $value = str_replace("[" . $match . "]", $propColumn, $value);
                    }
                }
                $spreadsheet->getActiveSheet()
                    ->setCellValueByColumnAndRow($column, $row, $value);

                $this->formatCell(
                    $spreadsheet->getActiveSheet()->getCellByColumnAndRow($column, $row),
                    $property
                );
                $column++;
            }
            $column = 1;
            $row++;
        }
        return parent::handle($generator);
    }

    /**
     * @param Cell $cell
     * @param AbstractProperty $property
     */
    private function formatCell(Cell $cell, AbstractProperty $property)
    {
        $cell->getStyle()
            ->getNumberFormat()
            ->setFormatCode($property->getFormatCode());
    }
}
