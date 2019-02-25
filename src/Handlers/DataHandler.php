<?php


namespace MisterIcy\ExcelWriter\Handlers;


use MisterIcy\ExcelWriter\Generator\AbstractGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;
use MisterIcy\ExcelWriter\Properties\AbstractProperty;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

final class DataHandler extends AbstractHandler
{
    /**
     * @param AbstractGenerator $generator
     * @return HandlerInterface
     */
    public function handle(GeneratorInterface $generator)
    {
        /**
         * Set Defaults
         */
        fwrite(STDOUT, "Got In Data Handler");
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
                    fwrite(STDOUT, $value . "\n");
                    $value = str_replace("{row}", strval($row), $value);
                    $value = str_replace("{col}", Coordinate::stringFromColumnIndex($column), $value);

                    fwrite(STDOUT, $value . "\n");
                }

                $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(
                    $column, $row, $value
                );
                $column++;
            }
            $column = 1;
            $row++;
        }
        return parent::handle($generator);
    }

}