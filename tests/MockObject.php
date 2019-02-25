<?php


namespace Tests;


class MockObject
{
    public $int = 0;

    public $bool = false;

    public $string = 'test';

    public function __construct()
    {
        $this->int = random_int(0, 42);
    }
}