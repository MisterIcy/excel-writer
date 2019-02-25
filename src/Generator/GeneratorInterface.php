<?php


namespace MisterIcy\ExcelWriter\Generator;


use MisterIcy\ExcelWriter\Handlers\HandlerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

interface GeneratorInterface
{
    function generate(Spreadsheet $spreadsheet = null) : self;

    function setHandler(HandlerInterface $handler);
}