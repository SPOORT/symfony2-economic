<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AccountHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DepartmentHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DistributionKeyHandle;

class Account extends EconomicSoapEntity
{
    const DEBIT = 'Debit';
    const CREDIT = 'Credit';

    /** @var $handle AccountHandle */
    private $handle;

    /** @var $number integer */
    private $number;

    /** @var $name string */
    private $name;

    /** @var $type string */
    private $type;

    /** @var $debitCredit string */
    private $debitCredit;

    /** @var $isAccessible boolean */
    private $isAccessible;

    /** @var $blockDirectEntries boolean */
    private $blockDirectEntries;

    /** @var $vatAccountAccountHandle AccountHandle */
    private $vatAccountAccountHandle;

    /** @var $contraAccountHandle AccountHandle */
    private $contraAccountHandle;

    /** @var $openingAccountHandle AccountHandle */
    private $openingAccountHandle;

    /** @var $totalFromHandle AccountHandle */
    private $totalFromHandle;

    /** @var $balance float */
    private $balance;

    /** @var $departmentHandle DepartmentHandle */
    private $departmentHandle;

    /** @var $distributionKeyHandle DistributionKeyHandle */
    private $distributionKeyHandle;

    /**
     * Account constructor.
     * @param null $soapObject
     */
    public function __construct($soapObject = null)
    {
        $this->setHandle(new AccountHandle());
        $this->setDepartmentHandle(new DepartmentHandle());
        $this->setContraAccountHandle(new AccountHandle());
        $this->setDistributionKeyHandle(new DistributionKeyHandle());
        $this->setOpeningAccountHandle(new AccountHandle());
        $this->setTotalFromHandle(new AccountHandle());
        $this->setVatAccountAccountHandle(new AccountHandle());

        parent::__construct($soapObject);
    }

    /**
     * @return float
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * @param float $balance
     * @return Account
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getBlockDirectEntries()
    {
        return $this->blockDirectEntries;
    }

    /**
     * @param boolean $blockDirectEntries
     * @return Account
     */
    public function setBlockDirectEntries($blockDirectEntries)
    {
        $this->blockDirectEntries = $blockDirectEntries;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getContraAccountHandle()
    {
        return $this->contraAccountHandle;
    }

    /**
     * @param AccountHandle $contraAccountHandle
     * @return Account
     */
    public function setContraAccountHandle($contraAccountHandle)
    {
        $this->contraAccountHandle = $contraAccountHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getDebitCredit()
    {
        return $this->debitCredit;
    }

    /**
     * @param string $debitCredit
     * @return Account
     */
    public function setDebitCredit($debitCredit)
    {
        $this->debitCredit = $debitCredit;

        return $this;
    }

    /**
     * @return DepartmentHandle
     */
    public function getDepartmentHandle()
    {
        return $this->departmentHandle;
    }

    /**
     * @param DepartmentHandle $departmentHandle
     * @return Account
     */
    public function setDepartmentHandle($departmentHandle)
    {
        $this->departmentHandle = $departmentHandle;

        return $this;
    }

    /**
     * @return DistributionKeyHandle
     */
    public function getDistributionKeyHandle()
    {
        return $this->distributionKeyHandle;
    }

    /**
     * @param DistributionKeyHandle $distributionKeyHandle
     * @return Account
     */
    public function setDistributionKeyHandle($distributionKeyHandle)
    {
        $this->distributionKeyHandle = $distributionKeyHandle;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param AccountHandle $handle
     * @return Account
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsAccessible()
    {
        return $this->isAccessible;
    }

    /**
     * @param boolean $isAccessible
     * @return Account
     */
    public function setIsAccessible($isAccessible)
    {
        $this->isAccessible = $isAccessible;

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
     * @return Account
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
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
     * @return Account
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getOpeningAccountHandle()
    {
        return $this->openingAccountHandle;
    }

    /**
     * @param AccountHandle $openingAccountHandle
     * @return Account
     */
    public function setOpeningAccountHandle($openingAccountHandle)
    {
        $this->openingAccountHandle = $openingAccountHandle;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getTotalFromHandle()
    {
        return $this->totalFromHandle;
    }

    /**
     * @param AccountHandle $totalFromHandle
     * @return Account
     */
    public function setTotalFromHandle($totalFromHandle)
    {
        $this->totalFromHandle = $totalFromHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @see Enum\AccountType
     * @return Account
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getVatAccountAccountHandle()
    {
        return $this->vatAccountAccountHandle;
    }

    /**
     * @param AccountHandle $vatAccountAccountHandle
     * @return Account
     */
    public function setVatAccountAccountHandle($vatAccountAccountHandle)
    {
        $this->vatAccountAccountHandle = $vatAccountAccountHandle;

        return $this;
    }

}