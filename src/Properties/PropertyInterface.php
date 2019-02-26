<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;

/**
 * Interface PropertyInterface
 * @package MisterIcy\ExcelWriter\Properties
 */
interface PropertyInterface
{
    /**
     * Checks if the supplied object has the required property and if the property is readable.
     *
     * Always returns true. An exception should be thrown when we cannot read the property
     * @throws PropertyException
     * @param $object
     * @return bool
     */
    public function checkProperty(object $object) : bool;

    /**
     * Renders a property and returns the value to be written.
     *
     * @throws PropertyException
     * @param $object
     * @return mixed
     */
    public function renderProperty(object $object);
}
