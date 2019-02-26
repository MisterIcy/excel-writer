<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use Doctrine\Common\Collections\ArrayCollection;
use http\Encoding\Stream\Inflate;
use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;

/**
 * Class PropertyCollection
 * @package MisterIcy\ExcelWriter\Properties
 */
final class PropertyCollection
{
    /** @var ArrayCollection */
    private $collection;

    /**
     * PropertyCollection constructor.
     */
    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    /**
     * @param PropertyInterface $property
     * @return self
     */
    public function addProperty(PropertyInterface $property)
    {
        $this->collection->add($property);
        return $this;
    }

    /**
     * @param PropertyInterface $property
     * @return self
     */
    public function removeProperty(PropertyInterface $property)
    {
        if ($this->collection->contains($property)) {
            $this->collection->removeElement($property);
        }
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getProperties()
    {
        return $this->collection;
    }

    /**
     * @param PropertyInterface $property
     * @return int
     * @throws PropertyException
     */
    public function getColumnOfProperty(PropertyInterface $property) : int
    {
        if ($this->getProperties()->contains($property)) {
            return $this->getProperties()->indexOf($property) +1;
        }
        throw new PropertyException("The specified property is not a part of the collection");
    }

    /**
     * @param PropertyInterface $property
     * @return string
     * @throws PropertyException
     */
    public function getExcelColumnOfProperty(PropertyInterface $property) : string
    {
        return Coordinate::stringFromColumnIndex($this->getColumnOfProperty($property));
    }

    /**
     * @param string $propertyPath
     * @return int
     * @throws PropertyException
     */
    public function getColumnOfPropertyPath(string $propertyPath) : int
    {
        /**
         * @var int $key
         * @var AbstractProperty $property
         */
        foreach ($this->getProperties()->toArray() as $key => $property) {
            if (strcmp($propertyPath, $property->getPath())) {
                return $this->getColumnOfProperty($property);
            }
        }
        throw new PropertyException("The specified property path is not found in any property of the collection");
    }

    /**
     * @param string $propertyPath
     * @return string
     * @throws PropertyException
     */
    public function getExcelColumnOfPropertyPath(string $propertyPath) : string
    {
        return $this->getExcelColumnOfProperty(
            $this->getColumnOfPropertyPath($propertyPath)
        );
    }
}
