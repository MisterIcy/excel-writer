<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Shared\Date;

trait DateTimeTrait
{
    /**
     * @param \DateTimeInterface $object
     * @return float
     * @throws PropertyException
     */
    public function convertDateTimeToExcelTime(\DateTimeInterface $object)
    {
        if (!$object instanceof \DateTimeInterface) {
            throw new PropertyException("Invalid Date Object Supplied");
        }

        $hour = intval($object->format('H'));
        $minute = intval($object->format('i'));
        $second = intval($object->format('s'));

        return (Date::formattedPHPToExcel(1900, 1,1, $hour, $minute, $second) - 1);
    }

    /**
     * @param \DateTimeInterface $object
     * @return float
     * @throws PropertyException
     */
    public function convertDateTimeToExcelDate(\DateTimeInterface $object) : float
    {
        if (!$object instanceof \DateTimeInterface) {
            throw new PropertyException("Invalid Date Object Supplied");
        }

        $year = intval($object->format('Y'));
        $month = intval($object->format('m'));
        $day = intval($object->format('d'));

        return Date::formattedPHPToExcel($year, $month, $day);
    }

    /**
     * @param \DateTimeInterface $object
     * @return float
     * @throws PropertyException
     */
    public function convertDateTimeToExcelDateTime(\DateTimeInterface $object) : float
    {
        return $this->convertDateTimeToExcelDate($object) + $this->convertDateTimeToExcelTime($object);

    }
}