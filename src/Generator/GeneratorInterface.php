<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Generator;

use MisterIcy\ExcelWriter\Handlers\HandlerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Interface GeneratorInterface
 * @package MisterIcy\ExcelWriter\Generator
 *
 * @author Alexandros Koutroulis
 * @license MIT
 */
interface GeneratorInterface
{
    function generate(Spreadsheet $spreadsheet = null) : self;

    function setHandler(HandlerInterface $handler);
}