<?php


namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;

final class CallableProperty extends AbstractProperty
{
    /** @var callable $callable */
    protected $callable;

    /**
     * @param object $object
     * @return mixed|string
     * @throws PropertyException
     * @throws \MisterIcy\ExcelWriter\Exceptions\PropertyException
     */
    public function renderProperty(object $object)
    {
        if (is_null($this->callable)) {
            throw new \Error("A function should be set, in order to get a result");
        }
        if ($this->isFormula) {
            throw new PropertyException("Unsupported");
        }
        return call_user_func($this->callable, parent::renderProperty($object));
    }

    /**
     * @return callable
     */
    public function getCallable(): callable
    {
        return $this->callable;
    }

    /**
     * @param callable $callable
     */
    public function setCallable(callable $callable)
    {
        $this->callable = $callable;
        return $this;
    }
}