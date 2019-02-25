<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class DateProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_DATE_DDMMYYYY;
    }

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);

        if (!$this->isFormula) {
            return floatval(
                $this->convertDateTimeToExcelDate(
                    $rendered
                )
            );
        }
        return $rendered;
    }

}