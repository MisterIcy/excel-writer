<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class TimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_DATE_TIME3;
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