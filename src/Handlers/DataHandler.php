<?php


namespace MisterIcy\ExcelWriter\Handlers;


use MisterIcy\ExcelWriter\Generator\AbstractGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;
use MisterIcy\ExcelWriter\Properties\AbstractProperty;
use MisterIcy\ExcelWriter\Properties\CurrencyProperty;
use MisterIcy\ExcelWriter\Properties\FloatProperty;
use MisterIcy\ExcelWriter\Properties\IntProperty;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

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

                }

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(
                    $column, $row, $value
                );
                $this->formatCell(
                    $spreadsheet->getActiveSheet()->getCellByColumnAndRow($column, $row),
                    $property
                );
                $column++;

            }
            $column = 1;
            $row++;
            fwrite(STDOUT, sprintf("\rWrote %d", $row));
        }
        return parent::handle($generator);
    }

    private function formatCell(Cell $cell, AbstractProperty $property)
    {
        $cell->getStyle()
            ->getNumberFormat()
            ->setFormatCode($property->getFormatCode());
    }

}