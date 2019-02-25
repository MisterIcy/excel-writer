<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;

final class TimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval(
                $this->convertDateTimeToExcelDateTime(
                    $this->getValue($rendered)
                )
            );
        }
        return $rendered;
    }

}