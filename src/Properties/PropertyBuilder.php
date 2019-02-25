<?php


namespace MisterIcy\ExcelWriter\Properties;

use MisterIcy\ExcelWriter\Exceptions\PropertyException;

class PropertyBuilder
{
    const BOOLEAN = BoolProperty::class;
    const CURRENCY = CurrencyProperty::class;
    const DATE = DateProperty::class;
    const TIME = TimeProperty::class;
    const DATETIME = DateTimeProperty::class;
    const FLOAT = FloatProperty::class;
    const INT = IntProperty::class;
    const STRING = StringProperty::class;

    private function __construct()
    {

    }

    /**
     * @param string $propertyType
     * @param string|null $propertyPath
     * @param bool $isFormula
     * @param string|null $formula
     * @return PropertyInterface
     * @throws PropertyException
     * @throws \ReflectionException
     */
    public static function createProperty(
        string $propertyType = self::STRING,
        string $propertyPath = null,
        bool $isFormula = false,
        string $formula = null
    ) : AbstractProperty {


        $propertyReflector = new \ReflectionClass($propertyType);
        /** @var AbstractProperty $property */
        $property = $propertyReflector->newInstance();

        if ($isFormula || $property->isFormula()) {
            if (is_null($formula)) {
                throw new PropertyException("A property marked as formula, should contain a formula");
            }
            $property->setIsFormula(true)
                ->setFormula($formula);
        } else {
            if (is_null($propertyPath)) {
                throw new PropertyException("A property's path cannot be empty");
            }
            $property->setPath($propertyPath);
        }
        return $property;
    }
}
