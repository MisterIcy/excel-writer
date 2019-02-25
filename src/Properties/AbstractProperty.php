<?php


namespace MisterIcy\ExcelWriter\Properties;


use MisterIcy\ExcelWriter\Exceptions\PropertyException;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\PropertyAccess\PropertyAccessor;

abstract class AbstractProperty implements PropertyInterface
{
    use FormulaTrait;

    /** @var PropertyAccessor */
    protected static $accessor;
    /**
     * Property Path
     *
     * @var string
     */
    protected $path;

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     * @return AbstractProperty
     */
    public function setPath(string $path): AbstractProperty
    {
        $this->path = $path;
        return $this;
    }

    public function renderProperty(object $object)
    {
        if ($this->isFormula) {
            return strval($this->getFormula());
        }
        return $this->getValue($object);
    }

    final protected static function getAccessor() {
        if (null === static::$accessor) {
            static::$accessor = PropertyAccess::createPropertyAccessor();
        }
        return static::$accessor;
    }

    public function checkProperty(object $object): bool
    {
        if (static::getAccessor()->isReadable($object, $this->getPath())) {
            return true;
        }
        $objectIdentifier = method_exists($object, '__toString') ?
            call_user_func_array([$object, '__toString'], []) : get_class($object);

        throw new PropertyException(
            sprintf("I couldn't read property %s of %s", $this->getPath(), $objectIdentifier)
        );
    }

    /**
     * @param object $object
     * @return mixed
     * @throws PropertyException
     */
    protected function getValue(object $object)
    {
        $this->checkProperty($object);
        return static::getAccessor()->getValue($object, $this->getPath());
    }
}