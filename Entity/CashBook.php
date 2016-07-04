<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CashBookHandle;

class CashBook extends EconomicSoapEntity
{
    const CASH_BOOK_HANDLE = 'Handle';
    const CASH_BOOK_NUMBER = 'Number';
    const CASH_BOOK_NAME = 'Name';
    const CASH_BOOK_ENTRIES = 'Entries';

    /** @var $handle CashBookHandle */
    private $handle;

    /** @var string $number */
    private $number;

    /** @var string $name */
    private $name;

    /**
     * CashBook constructor.
     * @param null $soapObject
     */
    public function __construct($soapObject)
    {
        $this->setHandle(new CashBookHandle());
        
        parent::__construct($soapObject);
    }

    /**
     * @return CashBookHandle
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param CashBookHandle $handle
     * @return CashBook
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return CashBook
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return CashBook
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}