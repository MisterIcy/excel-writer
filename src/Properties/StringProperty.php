<?php


namespace MisterIcy\ExcelWriter\Properties;


final class StringProperty extends AbstractProperty
{
    public function renderProperty(object $object)
    {
        return strval(parent::renderProperty($object));
    }
}