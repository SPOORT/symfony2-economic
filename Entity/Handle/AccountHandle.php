<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class AccountHandle
{

    /** @var $number integer */
    private $number;

    /**
     * AccountHandle constructor.
     * Create a new handle from the result of a SOAP API call.
     * @param $soapObject
     */
    public function __construct($soapObject)
    {
        if (is_object($soapObject) && isset($soapObject->Number)) {
            $this->setNumber($soapObject->Number);
        } else {

            throw new \InvalidArgumentException(sprintf('Cannot construct %s from given source object: Does not contain property %s.', get_class(), 'Number'));
        }
    }
    
    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}