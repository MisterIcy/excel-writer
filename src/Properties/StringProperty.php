<?php


namespace MisterIcy\ExcelWriter\Properties;


use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class StringProperty extends AbstractProperty
{
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_TEXT;
    }

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return strval($rendered);
        }
        return $rendered;
    }
}