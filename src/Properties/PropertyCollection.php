<?php


namespace MisterIcy\ExcelWriter\Properties;


use Doctrine\Common\Collections\ArrayCollection;

final class PropertyCollection
{
    /** @var ArrayCollection */
    private $collection;

    public function __construct()
    {
        $this->collection = new ArrayCollection();
    }

    public function addProperty(PropertyInterface $property)
    {
        $this->collection->add($property);
        return $this;
    }
    public function removeProperty(PropertyInterface $property)
    {
        if ($this->collection->contains($property) ) {
            $this->collection->removeElement($property);
        }
        return $this;
    }
    public function getProperties()
    {
        return $this->collection;
    }
}