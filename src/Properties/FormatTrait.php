<?php


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
     * @return FormatTrait
     */
    public function setFormatCode($formatCode)
    {
        $this->formatCode = $formatCode;
        return $this;
    }


}