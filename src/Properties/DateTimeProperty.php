<?php


namespace MisterIcy\ExcelWriter\Properties;


final class DateTimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function renderProperty(object $object)
    {
        if ($this->isFormula) {
            return (parent::renderProperty($object));
        }
        return intval(
            $this->convertDateTimeToExcelDateTime(
                $this->getValue($object)
            )
        );
    }

}