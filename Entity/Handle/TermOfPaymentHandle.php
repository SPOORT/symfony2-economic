<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class TermOfPaymentHandle
{
    /** @var $id integer */
    private $id;

    /**
     * TermOfPaymentHandle constructor.
     * Create a new handle from the result of a SOAP API call.
     * @param $soapObject
     */
    public function __construct($soapObject)
    {
        if (is_object($soapObject) && isset($soapObject->Id)) {
            $this->setId($soapObject->Id);
        } else {

            throw new \InvalidArgumentException(sprintf('Cannot construct %s from given source object: Does not contain property %s.', get_class(), 'Id'));
        }
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}