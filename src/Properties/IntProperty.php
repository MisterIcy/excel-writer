<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;

final class IntProperty extends AbstractProperty
{

    /**
     * Renders a property and returns the value to be written.
     *
     * @param $object
     * @return mixed
     * @throws PropertyException
     */
    function renderProperty(object $object)
    {
        return intval(parent::renderProperty($object));
    }


}