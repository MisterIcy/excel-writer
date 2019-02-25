<?php


namespace MisterIcy\ExcelWriter\Properties;


final class BoolProperty extends AbstractProperty
{
    public function renderProperty(object $object) : bool
    {
        $rendered = parent::renderProperty($object);
        if (!$this->isFormula) {
            return boolval($rendered);
        }
        return $rendered;
    }

}