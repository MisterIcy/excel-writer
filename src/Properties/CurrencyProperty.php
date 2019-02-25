<?php


namespace MisterIcy\ExcelWriter\Properties;


final class CurrencyProperty extends AbstractProperty
{
    public function renderProperty(object $object) : float
    {
        return boolval(parent::renderProperty($object));
    }

}