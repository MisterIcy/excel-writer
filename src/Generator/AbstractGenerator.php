<?php


namespace MisterIcy\ExcelWriter\Generator;


use MisterIcy\ExcelWriter\Exceptions\GeneratorException;
use MisterIcy\ExcelWriter\Handlers\HandlerInterface;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

abstract class AbstractGenerator implements GeneratorInterface
{
    /**
     * @var HandlerInterface
     */
    protected $handler;

    /**
     * @var array
     */
    protected $documentProperties;

    /**
     * @var Spreadsheet
     */
    protected $spreadsheet;

    /**
     * @param HandlerInterface $handler
     * @return HandlerInterface
     * @throws GeneratorException
     */
    public function setHandler(HandlerInterface $handler) : HandlerInterface
    {
        if (null === $this->handler) {
            $this->handler = $handler;
            return $this->handler;
        }
        throw new GeneratorException("The base handler for this generator is already set");
    }

    /**
     * @return array
     */
    public function getDocumentProperties(): array
    {
        return $this->documentProperties;
    }

    /**
     * @param array $documentProperties
     * @return AbstractGenerator
     */
    public function setDocumentProperties(array $documentProperties): AbstractGenerator
    {
        $this->documentProperties = $documentProperties;
        return $this;
    }

    /**
     * @return Spreadsheet
     */
    public function getSpreadsheet(): Spreadsheet
    {
        return $this->spreadsheet;
    }



}