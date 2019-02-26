<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

trait FormatTrait
{
    protected $formatCode;

    /**
     * @return mixed
     */
    public function getFormatCode()
    {
        return $this->formatCode;
    }

    /**
     * @param mixed $formatCode
     * @return mixed
     */
    public function setFormatCode($formatCode)
    {
        $this->formatCode = $formatCode;
        return $this;
    }


}