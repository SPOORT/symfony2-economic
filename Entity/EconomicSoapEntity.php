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
        if(null !== $soapObject) {
            $this->MirrorPropertyValues($soapObject);
        }
    }

    /**
     * Copy property values from a standard object into this object.
     * @param \stdClass $sourceObject
     */
    private function mirrorPropertyValues(\stdClass $sourceObject)
    {
        $thisReflection = new ReflectionObject($this);
        $thisProperties = $thisReflection->getProperties();

        foreach($thisProperties as $property) {
            // Atm we try to set every single property on ourselves, which could potentially explode.
            // Ideally we would use annotations to identify the correct properties, but PHP makes that sort of tedious, mumble mumble...

            $propertyName = $property->getName();
            $setter = $thisReflection->getMethod(sprintf('set%s', ucfirst($propertyName)));

            if(property_exists($sourceObject, $propertyName)) {
                // @TODO: Check whether it's faster to use reflection here, instead of dynamically accessing the property.
                $setter->invoke($this, $sourceObject->$propertyName);
            } else {

                throw new \InvalidArgumentException(sprintf('Cannot construct %s from given source object: Does not contain property %s.', get_class(), 'Number'));
            }
        }
    }
}