<?php


namespace MisterIcy\ExcelWriter\Generator;


use MisterIcy\ExcelWriter\Exceptions\GeneratorException;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

final class BasicGenerator extends AbstractGenerator
{
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
    function generate(Spreadsheet $spreadsheet = null): GeneratorInterface
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