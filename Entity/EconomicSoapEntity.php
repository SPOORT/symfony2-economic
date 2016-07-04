<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use ReflectionObject;

abstract class EconomicSoapEntity
{
    /**
     * EconomicSoapEntity constructor.
     * Optionally creates a new entity from the result of a SOAP API call.
     * @param $soapObject
     */
    public function __construct($soapObject = null)
    {
        if (null !== $soapObject) {
            $this->mirrorPropertyValues($soapObject);
        }
    }

    /**
     * Copy property values from a standard object into this object.
     * @param \stdClass $sourceObject
     */
    protected function mirrorPropertyValues(\stdClass $sourceObject)
    {
        $thisReflection = new ReflectionObject($this);
        $thisProperties = $thisReflection->getProperties();

        $sourceReflection = new ReflectionObject($sourceObject);

        foreach ($thisProperties as $thisProperty) {
            // Atm we try to set every single property on ourselves, which could potentially explode.
            // Ideally we would use annotations to identify the correct properties, but PHP makes that sort of tedious, mumble mumble...

            $thisPropertyName = $thisProperty->getName();
            $thisPropertyGetter = $thisReflection->getMethod(sprintf('get%s', ucfirst($thisPropertyName)));
            $thisPropertySetter = $thisReflection->getMethod(sprintf('set%s', ucfirst($thisPropertyName)));

            if ($sourceReflection->hasProperty($thisPropertyName)) {
                $thisPropertyValue = $thisPropertyGetter->invoke($this);
                $sourcePropertyValue = $sourceReflection->getProperty($thisPropertyName)->getValue($sourceObject);

                if ($thisPropertyValue instanceof EconomicSoapEntity) {
                    // If the property is a nested entity, tell that entity to copy values from the input.
                    // Since nested entities are created in constructors, this means they will have the correct class type.
                    $thisPropertyValue->mirrorPropertyValues($sourcePropertyValue);
                } else {
                    // For any other type, just set it directly.
                    $thisPropertySetter->invoke($this, $sourcePropertyValue);
                }
            }
        }
    }

    /**
     * Returns an associative array representation of the entity. Only non-null values will be included.
     * This is different from array_filter((array)object) in that our method will not return subtrees if they have no non-null values.
     */
    public function asTerseAssociateArray()
    {
        $result = [];

        $reflection = new ReflectionObject($this);
        $properties = $reflection->getProperties();

        foreach ($properties as $property) {
            $propertyName = $property->getName();
            $propertyGetter = $reflection->getMethod(sprintf('get%s', ucfirst($propertyName)));
            $propertyValue = $propertyGetter->invoke($this);

            if($propertyValue instanceof EconomicSoapEntity) {
                // If the property is a nested entity, let it convert itself.
                $propertyConvertedValue = $propertyValue->asTerseAssociateArray();

                if(!empty($propertyConvertedValue)) {
                    $result[$propertyName] = $propertyConvertedValue;
                }
            } else {
                if(null !== $propertyValue) {
                    $result[$propertyName] = $propertyValue;
                }
            }
        }

        return $result;
    }
}