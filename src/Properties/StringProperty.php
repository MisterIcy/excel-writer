<?php


namespace MisterIcy\ExcelWriter\Properties;


final class StringProperty extends AbstractProperty
{
    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return strval($rendered);
        }
        return $rendered;
    }
}