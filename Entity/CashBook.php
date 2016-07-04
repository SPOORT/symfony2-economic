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
    private $Handle;

    /** @var string $number */
    private $Number;

    /** @var string $name */
    private $Name;

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
        return $this->Handle;
    }

    /**
     * @param CashBookHandle $handle
     * @return CashBook
     */
    public function setHandle($handle)
    {
        $this->Handle = $handle;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * @param string $number
     * @return CashBook
     */
    public function setNumber($number)
    {
        $this->Number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @param string $name
     * @return CashBook
     */
    public function setName($name)
    {
        $this->Name = $name;

        return $this;
    }
}