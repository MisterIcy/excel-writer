<?php


namespace MisterIcy\ExcelWriter\Handlers;


use MisterIcy\ExcelWriter\Generator\AbstractGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;
use PhpOffice\PhpSpreadsheet\Cell\Cell;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Style;

final class FormatHandler extends AbstractHandler
{
    /**
     * @param AbstractGenerator $generator
     * @return null
     */
    public function handle(GeneratorInterface $generator)
    {
        $spreadsheet = $generator->getSpreadsheet();
        $data = $generator->getData();
        $properties = $generator->getProperties();

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

        $spreadsheet->getActiveSheet()->duplicateStyle(
            $style, sprintf("A1:%s%d", $col, $highestRow)
        );
        return parent::handle($generator);
    }

}