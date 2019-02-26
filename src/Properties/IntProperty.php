<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class IntProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class IntProperty extends AbstractProperty
{
    /**
     * IntProperty constructor.
     */
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
    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return intval($rendered);
        }
        return $rendered;
    }
}
