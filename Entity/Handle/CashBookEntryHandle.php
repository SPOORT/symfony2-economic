<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class CashBookEntryHandle
{
    /** @var $id1 integer */
    private $id1;

    /** @var $id2 integer */
    private $id2;

    /**
     * CashBookEntryHandle constructor.
     * Create a new handle from the result of a SOAP API call.
     * @param $soapObject
     */
    public function __construct($soapObject)
    {
        if (is_object($soapObject) && isset($soapObject->Id1) && isset($soapObject->Id2)) {
            $this->setId1($soapObject->Id1);
            $this->setId2($soapObject->Id2);
        } else {

            throw new \InvalidArgumentException(sprintf('Cannot construct %s from given source object: Does not contain properties %s and %s.', get_class(), 'Id1', 'Id2'));
        }
    }

    /**
     * @return int
     */
    public function getId1()
    {
        return $this->id1;
    }

    /**
     * @param int $id1
     * @return self
     */
    public function setId1($id1)
    {
        $this->id1 = $id1;

        return $this;
    }

    /**
     * @return int
     */
    public function getId2()
    {
        return $this->id2;
    }

    /**
     * @param int $id2
     * @return self
     */
    public function setId2($id2)
    {
        $this->id2 = $id2;

        return $this;
    }


}