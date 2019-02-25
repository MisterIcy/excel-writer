<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;

final class TimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function renderProperty(object $object)
    {
        if ($this->isFormula) {
            return (parent::renderProperty($object));
        }
        return floatval(
            $this->convertDateTimeToExcelTime(
                $this->getValue($object)
            )
        );
    }

}