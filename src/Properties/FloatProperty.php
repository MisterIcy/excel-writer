<?php


namespace MisterIcy\ExcelWriter\Properties;


final class FloatProperty extends AbstractProperty
{
    public function renderProperty(object $object)
    {
        return floatval(parent::renderProperty($object));
    }
}