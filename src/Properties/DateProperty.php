<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use MisterIcy\ExcelWriter\Properties\Traits\DateTimeTrait;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class DateProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class DateProperty extends AbstractProperty
{
    use DateTimeTrait;

    /**
     * DateProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_DATE_DDMMYYYY;
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
            return (
                $this->convertDateTimeToExcelDate(
                    $rendered
                )
            );
        }
        return $rendered;
    }
}
