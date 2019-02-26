<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use MisterIcy\ExcelWriter\Properties\Traits\DateTimeTrait;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class DateTimeProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class DateTimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    /**
     * DateTimeProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_DATE_DATETIME;
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
            return floatval(
                $this->convertDateTimeToExcelDateTime(
                    $rendered
                )
            );
        }
        return $rendered;
    }
}
