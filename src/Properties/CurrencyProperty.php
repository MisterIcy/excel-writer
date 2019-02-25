<?php


namespace MisterIcy\ExcelWriter\Properties;


use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class CurrencyProperty extends AbstractProperty
{
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE;
    }

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval($rendered);
        }
        return $rendered;
    }

}