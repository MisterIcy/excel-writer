<?php


namespace MisterIcy\ExcelWriter\Properties;


use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class DateTimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_DATE_DATETIME;
    }

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval(
                $this->convertDateTimeToExcelDateTime(
                    $rendered
                )
            );
        }
        return $rendered;
    }

}