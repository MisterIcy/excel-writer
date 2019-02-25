<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

final class IntProperty extends AbstractProperty
{

    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_NUMBER;
    }

    /**
     * Renders a property and returns the value to be written.
     *
     * @param $object
     * @return mixed
     * @throws PropertyException
     */
    function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return intval($rendered);
        }
        return $rendered;
    }


}