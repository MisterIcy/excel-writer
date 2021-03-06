<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use MisterIcy\ExcelWriter\Properties\Traits\DateTimeTrait;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class TimeProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class TimeProperty extends AbstractProperty
{
    use DateTimeTrait;

    /**
     * TimeProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_DATE_TIME3;
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
                $this->convertDateTimeToExcelTime(
                    $rendered
                )
            );
        }
        return $rendered;
    }
}
