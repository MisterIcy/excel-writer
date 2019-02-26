<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Generator;

use MisterIcy\ExcelWriter\Exceptions\GeneratorException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Class BasicGenerator
 * @package MisterIcy\ExcelWriter\Generator
 */
final class BasicGenerator extends AbstractGenerator
{
    /**
     * BasicGenerator constructor.
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     */
    public function __construct()
    {
        $this->spreadsheet = new Spreadsheet();
        $this->spreadsheet->setActiveSheetIndex(0);
    }

    /**
     * @param Spreadsheet|null $spreadsheet
     * @return GeneratorInterface
     * @throws GeneratorException
     */
    public function generate(Spreadsheet $spreadsheet = null): GeneratorInterface
    {
        if (is_null($this->handler)) {
            throw new GeneratorException("Handlers must be provided in order to generate a document");
        }
        if (!is_null($spreadsheet)) {
            $this->spreadsheet = $spreadsheet;
        }
        $this->handler->handle($this);

        return $this;
    }
}
