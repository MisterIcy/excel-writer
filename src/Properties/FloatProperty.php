<?php


namespace MisterIcy\ExcelWriter\Properties;


final class FloatProperty extends AbstractProperty
{
    public function renderProperty(object $object)
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return floatval($rendered);
        }
        return $rendered;
    }
}