<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties\Traits;

use MisterIcy\ExcelWriter\Properties\AbstractProperty;

/**
 * Callable Trait defines a shared trait for all classes that should have callable functions.
 *
 * For the time being, this is only used by {@see AbstractProperty} to define properties
 * that execute a function, before rendering their result
 *
 * @author Alexandros Koutroulis <icyd3mon@gmail.com>
 * @license MIT
 *
 * @package MisterIcy\ExcelWriter\Properties\Traits
 */
trait CallableTrait
{
    /** @var callable|null */
    protected $callable = null;

    protected function handleCallable($object)
    {
        if (is_null($this->callable)) {
            throw new \Error("Undefined Callable");
        }
        return call_user_func($this->callable, $object);
    }

    /**
     * @return callable|null
     */
    public function getCallable()
    {
        return $this->callable;
    }

    /**
     * @param callable $callable
     * @return self
     */
    public function setCallable(callable $callable) : self
    {
        $this->callable = $callable;
        return $this;
    }
}
