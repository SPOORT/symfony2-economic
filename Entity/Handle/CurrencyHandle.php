<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class CurrencyHandle
{

    /** @var $code string */
    private $code;

    /**
     * CurrencyHandle constructor.
     * Create a new handle from the result of a SOAP API call.
     * @param $soapObject
     */
    public function __construct($soapObject)
    {
        if (is_object($soapObject) && isset($soapObject->Code)) {
            $this->setCode($soapObject->Code);
        } else {

            throw new \InvalidArgumentException(sprintf('Cannot construct %s from given source object: Does not contain property %s.', get_class(), 'Code'));
        }
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}