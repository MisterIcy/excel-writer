<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Handlers;

use MisterIcy\ExcelWriter\Generator\AbstractGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;
use MisterIcy\ExcelWriter\Properties\AbstractProperty;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Style;

/**
 * Class FormatHandler
 * @package MisterIcy\ExcelWriter\Handlers
 */
final class FormatHandler extends AbstractHandler
{
    /**
     * @param AbstractGenerator $generator
     * @return null
     */
    public function handle(GeneratorInterface $generator)
    {
        /** @scrutinizer ignore-call */
        $spreadsheet = $generator->getSpreadsheet();
        /** @scrutinizer ignore-call */
        $data = $generator->getData();
        /** @scrutinizer ignore-call */
        $properties = $generator->getProperties();
        /** @var AbstractProperty $property */
        $columns = 1;
        foreach ($properties->getProperties() as $property) {
            if (($width = $property->getWidth()) > 0) {
                $spreadsheet->getActiveSheet()
                    ->getColumnDimension(
                        Coordinate::stringFromColumnIndex($columns)
                    )->setWidth($width);
            }

            if (($header = $property->getTitle()) !== '') {
                $spreadsheet->getActiveSheet()
                    ->setCellValueByColumnAndRow($columns, 1, $header);
            }

            $columns++;
        }

        $highestRow = 1 + count($data);
        $highestCol = count($properties->getProperties());

        $style = new Style();
        $style->getFont()
            ->setName('Arial')
            ->setSize(8);

        $style->getBorders()
            ->getLeft()
            ->setBorderStyle(Border::BORDER_THIN);

        $style->getBorders()
            ->getRight()
            ->setBorderStyle(Border::BORDER_THIN);

        $style->getBorders()
            ->getBottom()
            ->setBorderStyle(Border::BORDER_THIN);

        $style->getBorders()
            ->getTop()
            ->setBorderStyle(Border::BORDER_THIN);

        $style->getAlignment()
            ->setWrapText(true)
            ->setShrinkToFit(true)
            ->setHorizontal(Alignment::HORIZONTAL_CENTER)
            ->setVertical(Alignment::VERTICAL_CENTER);

        $col = Coordinate::stringFromColumnIndex($highestCol);

        $spreadsheet->getActiveSheet()
            ->duplicateStyle($style, sprintf("A1:%s%d", $col, $highestRow));
        return parent::handle($generator);
    }
}
