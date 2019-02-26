<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties\Traits;

use PhpOffice\PhpSpreadsheet\Shared\Date;
use DateTimeInterface;
use TypeError;
/**
 * Trait DateTimeTrait
 * @package MisterIcy\ExcelWriter\Properties
 *
 * @author Alexandros Koutroulis
 * @license MIT
 */
trait DateTimeTrait
{
    /**
     * Allows null dates or other artifacts that are not of type {@see DateTimeInterface}.
     * @var bool
     */
    private $nullAllowed = false;

    /**
     * @return bool
     */
    public function isNullAllowed(): bool
    {
        return $this->nullAllowed;
    }

    /**
     * @param bool $nullAllowed
     * @return self
     */
    public function setNullAllowed(bool $nullAllowed)
    {
        $this->nullAllowed = $nullAllowed;
        return $this;
    }

    /**
     * Coverts a DateTime object to Excel Time (float)
     *
     * @param DateTimeInterface $object
     * @return float
     * @throws TypeError
     */
    public function convertDateTimeToExcelTime(DateTimeInterface $object) : float
    {
        //This is unrecoverable - we can't just assume Null.
        //The developer must handle this error.
        if (!$object instanceof DateTimeInterface) {
            if ($this->isNullAllowed()) {
                return 0;
            }
            throw new TypeError("Invalid date object supplied to datetime converter");
        }

        $hour = intval($object->format('H'));
        $minute = intval($object->format('i'));
        $second = intval($object->format('s'));

        return (Date::formattedPHPToExcel(1900, 1,1, $hour, $minute, $second) - 1);
    }

    /**
     * Coverts a DateTime object to excel Date (float)
     *
     * @param DateTimeInterface $object
     * @return float
     * @throws TypeError
     */
    public function convertDateTimeToExcelDate(DateTimeInterface $object) : float
    {
        //This is unrecoverable - we can't just assume Null.
        //The developer must handle this error.
        if (!$object instanceof DateTimeInterface) {
            if ($this->isNullAllowed()) {
                return 0;
            }
            throw new TypeError("Invalid date object supplied to datetime converter");
        }

        $year = intval($object->format('Y'));
        $month = intval($object->format('m'));
        $day = intval($object->format('d'));

        return Date::formattedPHPToExcel($year, $month, $day);
    }

    /**
     * @param DateTimeInterface $object
     * @return float
     * @throws TypeError
     */
    public function convertDateTimeToExcelDateTime(DateTimeInterface $object) : float
    {
        return $this->convertDateTimeToExcelDate($object) + $this->convertDateTimeToExcelTime($object);
    }
}
