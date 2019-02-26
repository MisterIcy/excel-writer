<?php


namespace MisterIcy\ExcelWriter\Properties;


trait CallableTrait
{
    /** @var callable */
    protected $callable;

    protected function handleCallable($object)
    {
        if (is_null($this->callable)) {
            throw new \Error("Undefined Callable");
        }
        return call_user_func($this->callable, $object);
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
     * @return mixed
     */
    public function setCallable(callable $callable)
    {
        $this->callable = $callable;
        return $this;
    }
}
