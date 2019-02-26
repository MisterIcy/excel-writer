<?php


namespace Tests;


use PhpOffice\PhpSpreadsheet\Calculation\DateTime;

class MockObject
{
    public $int = 0;

    public $bool = false;

    public $string = 'test';

    public $float = 0;

    /** @var \DateTime $dateTime */
    public $dateTime;


    public function __construct()
    {
        if (random_int(0,1000) > 500) {
            $this->dateTime = new \DateTime('@' . random_int(0, 1551095933));
        } else {
            $this->dateTime = null;
        }

        $this->int = random_int(0, 42);
        $this->float = random_int(0, PHP_INT_MAX) / PHP_INT_MAX;
    }
    public function __toString()
    {
        return get_class($this) . "#" . $this->int;
    }
}