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
    /**
     * @param Spreadsheet|null $spreadsheet
     * @return GeneratorInterface
     */
    public function generate(Spreadsheet $spreadsheet = null) : self;

    /**
     * @param HandlerInterface $handler
     * @return mixed
     */
    public function setHandler(HandlerInterface $handler);
}
