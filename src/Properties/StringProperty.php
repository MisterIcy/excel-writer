<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class StringProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class StringProperty extends AbstractProperty
{
    /**
     * StringProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_TEXT;
    }

    /**
     * @param object $object
     * @return mixed|string
     * @throws PropertyException
     */
    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return strval($rendered);
        }
        return $rendered;
    }
}
