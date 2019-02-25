<?php


namespace MisterIcy\ExcelWriter\Properties;


final class BoolProperty extends AbstractProperty
{
    public function renderProperty(object $object) : bool
    {
        return boolval(parent::renderProperty($object));
    }

}