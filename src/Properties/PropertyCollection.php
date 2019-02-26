<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use Doctrine\Common\Collections\ArrayCollection;

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
}
