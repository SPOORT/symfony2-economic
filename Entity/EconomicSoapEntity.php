<?php
/**
 * This file is part of SPOORT International ApS
 * and belongs to SPOORT International ApS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


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
                    $thisPropertyValue->mirrorPropertyValues($sourcePropertyValue);
                } else {
                    $thisPropertySetter->invoke($this, $sourcePropertyValue);
                }
            }
        }
    }
}