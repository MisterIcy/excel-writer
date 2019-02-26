<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use MisterIcy\ExcelWriter\Exceptions\PropertyException;

/**
 * Class BoolProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class BoolProperty extends AbstractProperty
{
    /**
     * BoolProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_GENERAL;
    }

    /**
     * @param object $object
     * @return bool|mixed
     * @throws PropertyException
     */
    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return boolval($rendered);
        }
        return $rendered;
    }
}
