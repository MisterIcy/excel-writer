<?php


namespace MisterIcy\ExcelWriter\Properties;


final class CurrencyProperty extends AbstractProperty
{
    public function renderProperty(object $object) : float
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval($rendered);
        }
        return $rendered;
    }

}