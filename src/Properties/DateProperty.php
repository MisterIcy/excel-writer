<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;

final class DateProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function renderProperty(object $object) : bool
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval(
                $this->convertDateTimeToExcelDate(
                    $this->getValue($rendered)
                )
            );
        }
        return $rendered;
    }

}