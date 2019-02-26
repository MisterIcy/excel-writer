<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Class CurrencyProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
final class CurrencyProperty extends AbstractProperty
{
    /**
     * CurrencyProperty constructor.
     */
    public function __construct()
    {
        $this->formatCode = NumberFormat::FORMAT_CURRENCY_EUR_SIMPLE;
    }

    /**
     * @param object $object
     * @return float|mixed
     * @throws \MisterIcy\ExcelWriter\Exceptions\PropertyException
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
