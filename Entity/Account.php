<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AccountHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DepartmentHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DistributionKeyHandle;

class Account extends EconomicSoapEntity
{
    const DEBIT = 'Debit';
    const CREDIT = 'Credit';

    /** @var $Handle AccountHandle */
    private $Handle;

    /** @var $Number integer */
    private $Number;

    /** @var $Name string */
    private $Name;

    /** @var $Type string */
    private $Type;

    /** @var $DebitCredit string */
    private $DebitCredit;

    /** @var $IsAccessible boolean */
    private $IsAccessible;

    /** @var $BlockDirectEntries boolean */
    private $BlockDirectEntries;

    /** @var $VatAccountAccountHandle AccountHandle */
    private $VatAccountAccountHandle;

    /** @var $ContraAccountHandle AccountHandle */
    private $ContraAccountHandle;

    /** @var $OpeningAccountHandle AccountHandle */
    private $OpeningAccountHandle;

    /** @var $TotalFromHandle AccountHandle */
    private $TotalFromHandle;

    /** @var $Balance float */
    private $Balance;

    /** @var $DepartmentHandle DepartmentHandle */
    private $DepartmentHandle;

    /** @var $DistributionKeyHandle DistributionKeyHandle */
    private $DistributionKeyHandle;

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
        return $this->Balance;
    }

    /**
     * @param float $Balance
     * @return Account
     */
    public function setBalance($Balance)
    {
        $this->Balance = $Balance;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getBlockDirectEntries()
    {
        return $this->BlockDirectEntries;
    }

    /**
     * @param boolean $BlockDirectEntries
     * @return Account
     */
    public function setBlockDirectEntries($BlockDirectEntries)
    {
        $this->BlockDirectEntries = $BlockDirectEntries;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getContraAccountHandle()
    {
        return $this->ContraAccountHandle;
    }

    /**
     * @param AccountHandle $ContraAccountHandle
     * @return Account
     */
    public function setContraAccountHandle($ContraAccountHandle)
    {
        $this->ContraAccountHandle = $ContraAccountHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getDebitCredit()
    {
        return $this->DebitCredit;
    }

    /**
     * @param string $DebitCredit
     * @return Account
     */
    public function setDebitCredit($DebitCredit)
    {
        $this->DebitCredit = $DebitCredit;

        return $this;
    }

    /**
     * @return DepartmentHandle
     */
    public function getDepartmentHandle()
    {
        return $this->DepartmentHandle;
    }

    /**
     * @param DepartmentHandle $DepartmentHandle
     * @return Account
     */
    public function setDepartmentHandle($DepartmentHandle)
    {
        $this->DepartmentHandle = $DepartmentHandle;

        return $this;
    }

    /**
     * @return DistributionKeyHandle
     */
    public function getDistributionKeyHandle()
    {
        return $this->DistributionKeyHandle;
    }

    /**
     * @param DistributionKeyHandle $DistributionKeyHandle
     * @return Account
     */
    public function setDistributionKeyHandle($DistributionKeyHandle)
    {
        $this->DistributionKeyHandle = $DistributionKeyHandle;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getHandle()
    {
        return $this->Handle;
    }

    /**
     * @param AccountHandle $Handle
     * @return Account
     */
    public function setHandle($Handle)
    {
        $this->Handle = $Handle;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getIsAccessible()
    {
        return $this->IsAccessible;
    }

    /**
     * @param boolean $IsAccessible
     * @return Account
     */
    public function setIsAccessible($IsAccessible)
    {
        $this->IsAccessible = $IsAccessible;

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
     * @param string $Name
     * @return Account
     */
    public function setName($Name)
    {
        $this->Name = $Name;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * @param int $Number
     * @return Account
     */
    public function setNumber($Number)
    {
        $this->Number = $Number;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getOpeningAccountHandle()
    {
        return $this->OpeningAccountHandle;
    }

    /**
     * @param AccountHandle $OpeningAccountHandle
     * @return Account
     */
    public function setOpeningAccountHandle($OpeningAccountHandle)
    {
        $this->OpeningAccountHandle = $OpeningAccountHandle;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getTotalFromHandle()
    {
        return $this->TotalFromHandle;
    }

    /**
     * @param AccountHandle $TotalFromHandle
     * @return Account
     */
    public function setTotalFromHandle($TotalFromHandle)
    {
        $this->TotalFromHandle = $TotalFromHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param string $Type
     * @see Enum\AccountType
     * @return Account
     */
    public function setType($Type)
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getVatAccountAccountHandle()
    {
        return $this->VatAccountAccountHandle;
    }

    /**
     * @param AccountHandle $VatAccountAccountHandle
     * @return Account
     */
    public function setVatAccountAccountHandle($VatAccountAccountHandle)
    {
        $this->VatAccountAccountHandle = $VatAccountAccountHandle;

        return $this;
    }

}