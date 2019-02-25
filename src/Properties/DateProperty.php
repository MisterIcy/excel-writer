<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;

final class DateProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function renderProperty(object $object) : bool
    {
        if ($this->isFormula) {
            return (parent::renderProperty($object));
        }
        return floatval(
            $this->convertDateTimeToExcelDate(
                $this->getValue($object)
            )
        );
    }

}