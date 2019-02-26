<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class FloatProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class FloatProperty extends AbstractProperty
{
    /**
     * FloatProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_NUMBER_00;
    }

    /**
     * @param object $object
     * @return float|mixed
     * @throws PropertyException
     */
    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval($rendered);
        }
        return $rendered;
    }
}
