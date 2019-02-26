<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Generator;

use MisterIcy\ExcelWriter\Exceptions\GeneratorException;
use MisterIcy\ExcelWriter\Handlers\HandlerInterface;
use MisterIcy\ExcelWriter\Properties\PropertyCollection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

/**
 * Defines an AbstractGenerator, the base of all Generators.
 *
 * @package MisterIcy\ExcelWriter\Generator
 *
 * @author Alexandros Koutroulis <icyd3mon@gmail.com>
 * @license MIT
 */
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
     * @var PropertyCollection
     */
    protected $properties;

    /**
     * @var array
     */
    protected $data;

    /**
     * @return PropertyCollection
     */
    public function getProperties(): PropertyCollection
    {
        return $this->properties;
    }

    /**
     * @param PropertyCollection $properties
     * @return AbstractGenerator
     */
    public function setProperties(PropertyCollection $properties): AbstractGenerator
    {
        $this->properties = $properties;
        return $this;
    }

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

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param array $data
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }


}