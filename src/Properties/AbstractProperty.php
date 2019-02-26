<?php
declare(strict_types=1);

namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use MisterIcy\ExcelWriter\Properties\Traits\CallableTrait;
use MisterIcy\ExcelWriter\Properties\Traits\FormatTrait;
use MisterIcy\ExcelWriter\Properties\Traits\FormulaTrait;
use MisterIcy\ExcelWriter\Properties\Traits\HeaderTrait;
use MisterIcy\ExcelWriter\Properties\Traits\NullableTrait;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Error;

/**
 * Class AbstractProperty
 * @package MisterIcy\ExcelWriter\Properties
 */
abstract class AbstractProperty implements PropertyInterface
{
    use FormulaTrait, FormatTrait, HeaderTrait, CallableTrait, NullableTrait;

    /**
     * A static property accessor to read data from arrays/objects
     *
     * @var PropertyAccessor
     */
    protected static $accessor;

    /**
     * Property Path
     *
     * @var string
     */
    protected $path;

    /**
     * @return string|null
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return self
     */
    public function setPath(string $path): self
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Checks if we passed a callable in the property, thus
     * making it callable - a custom function must be executed
     * before rendering the final value
     *
     * @return bool
     */
    public function isCallable() : bool
    {
        return (!is_null($this->callable));
    }

    /**
     * Renders a property's value
     *
     * @param object $object
     * @return mixed
     * @throws PropertyException
     */
    public function renderProperty(object $object)
    {

        if ($this->isCallable()) {
            return $this->handleCallable($this->getValue($object));
        }

        if ($this->isFormula) {
            return strval($this->getFormula());
        }

        return $this->getValue($object);
    }

    /**
     * Gets the Property Accessor, in a singleton way
     *
     * @return PropertyAccessor
     */
    final protected static function getAccessor()
    {
        if (null === static::$accessor) {
            static::$accessor = PropertyAccess::createPropertyAccessor();
        }
        return static::$accessor;
    }

    /**
     * Checks if a property is valid and readable
     *
     * @param object $object
     * @return bool
     * @throws Error
     */
    public function checkProperty(object $object): bool
    {


        if (static::getAccessor()->isReadable($object, $this->getPath())) {
            return true;
        }
        if (!$this->isStrict()) {
            return false;
        }
        $objectIdentifier = method_exists($object, '__toString') ?
            call_user_func_array([$object, '__toString'], []) : get_class($object);
        throw new Error(
            sprintf("I couldn't read property %s of %s", $this->getPath(), $objectIdentifier)
        );
    }

    /**
     * Gets the value of a specific object's property
     *
     * @param object $object
     * @return mixed
     * @throws PropertyException
     */
    protected function getValue(object $object)
    {
        $check = $this->checkProperty($object);
        if ($check) {
            return static::getAccessor()->getValue($object, $this->getPath());
        }
        return null;
    }
}
