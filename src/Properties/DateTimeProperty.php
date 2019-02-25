<?php


namespace MisterIcy\ExcelWriter\Properties;


final class DateTimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval(
                $this->convertDateTimeToExcelTime(
                    $this->getValue($rendered)
                )
            );
        }
        return $rendered;
    }

}