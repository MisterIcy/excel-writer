<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Handlers;

use MisterIcy\ExcelWriter\Generator\BasicGenerator;
use MisterIcy\ExcelWriter\Generator\GeneratorInterface;

/**
 * Class MetadataHandler
 * @package MisterIcy\ExcelWriter\Handlers
 */
final class MetadataHandler extends AbstractHandler
{
    /**
     * @param BasicGenerator $generator
     * @return HandlerInterface
     */
    public function handle(GeneratorInterface $generator)
    {
        $spreadsheet = $generator->getSpreadsheet();
        $spreadsheet->getProperties()
            ->setCreator('mistericy/excel-writer');

        return parent::handle($generator); // TODO: Change the autogenerated stub
    }
}
