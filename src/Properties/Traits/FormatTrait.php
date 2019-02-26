<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties\Traits;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

/**
 * Trait FormatTrait
 * @author Alexandros Koutroulis
 * @license MIT
 *
 * @package MisterIcy\ExcelWriter\Properties
 */
trait FormatTrait
{
    /** @var string  */
    protected $formatCode = NumberFormat::FORMAT_GENERAL;

    /**
     * @return string
     */
    public function getFormatCode() : string
    {
        return $this->formatCode;
    }

    /**
     * @param string $formatCode
     * @return self
     */
    public function setFormatCode(string $formatCode)
    {
        $this->formatCode = $formatCode;
        return $this;
    }
}
