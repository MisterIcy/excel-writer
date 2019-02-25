<?php


namespace MisterIcy\ExcelWriter\Properties;


use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class BoolProperty extends AbstractProperty
{
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_GENERAL;
    }

    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return boolval($rendered);
        }
        return $rendered;
    }

}