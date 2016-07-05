<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\Enum\CashBookEntryType;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AccountHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CapitaliseHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CashBookEntryHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CashBookHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CostTypeHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CurrencyHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DebtorHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DepartmentHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DistributionKeyHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\EmployeeHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\PaymentTypeHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\ProjectHandle;

class CashBookEntry extends EconomicSoapEntity
{
    /** @var CashBookEntryHandle $Handle */
    private $Handle;

    /** @var integer $Id1 */
    private $Id1;

    /** @var integer $Id2 */
    private $Id2;

    /** @var CashBookEntryType $Type */
    private $Type;

    /** @var CashBookHandle $CashBookHandle */
    private $CashBookHandle;

    /** @var DebtorHandle $DebtorHandle */
    private $DebtorHandle;

    /** @var CreditorHandle $CreditorHandle */
    private $CreditorHandle;

    /** @var AccountHandle $AccountHandle */
    private $AccountHandle;

    /** @var AccountHandle $ContraAccountHandle */
    private $ContraAccountHandle;

    /** @var \DateTime $Date */
    private $Date;

    /** @var integer $VoucherNumber */
    private $VoucherNumber;

    /** @var string $Text */
    private $Text;

    /** @var float $AmountDefaultCurrency */
    private $AmountDefaultCurrency;

    /** @var CurrencyHandle $CurrencyHandle */
    private $CurrencyHandle;

    /** @var float $Amount */
    private $Amount;

    /** @var AccountHandle $VatAccountHandle */
    private $VatAccountHandle;

    /** @var AccountHandle $ContraVatAccountHandle */
    private $ContraVatAccountHandle;

    /** @var integer $DebtorInvoiceNumber */
    private $DebtorInvoiceNumber;

    /** @var integer $CreditorInvoiceNumber */
    private $CreditorInvoiceNumber;

    /** @var \DateTime $DueDate */
    private $DueDate;

    /** @var DepartmentHandle $DepartmentHandle */
    private $DepartmentHandle;

    /** @var DistributionKeyHandle $DistributionKeyHandle */
    private $DistributionKeyHandle;

    /** @var ProjectHandle $ProjectHandle */
    private $ProjectHandle;

    /** @var CostTypeHandle $CostTypeHandle */
    private $CostTypeHandle;

    /** @var PaymentTypeHandle $BankPaymentTypeHandle */
    private $BankPaymentTypeHandle;

    /** @var string $BankPaymentCreditorId */
    private $BankPaymentCreditorId;

    /** @var string $BankPaymentCreditorInvoiceId */
    private $BankPaymentCreditorInvoiceId;

    /** @var CapitaliseHandle $CapitaliseHandle */
    private $CapitaliseHandle;

    /** @var \DateTime $StartDate */
    private $StartDate;

    /** @var \DateTime $EndDate */
    private $EndDate;

    /** @var EmployeeHandle $EmployeeHandle */
    private $EmployeeHandle;

    /**
     * CashBookEntry constructor.
     * @param null $soapObject
     */
    public function __construct($soapObject = null)
    {
        $this->setHandle(new CashBookEntryHandle());
        $this->setCurrencyHandle(new CurrencyHandle());
        $this->setCapitaliseHandle(new CapitaliseHandle());
        $this->setCreditorHandle(new CreditorHandle());
        $this->setAccountHandle(new AccountHandle());
        $this->setDebtorHandle(new DebtorHandle());
        $this->setDepartmentHandle(new DepartmentHandle());
        $this->setEmployeeHandle(new EmployeeHandle());
        $this->setProjectHandle(new ProjectHandle());
        $this->setCashBookHandle(new CashBookHandle());
        $this->setContraAccountHandle(new AccountHandle());
        $this->setCostTypeHandle(new CostTypeHandle());
        $this->setDistributionKeyHandle(new DistributionKeyHandle());
        $this->setVatAccountHandle(new AccountHandle());
        $this->setDebtorHandle(new DebtorHandle());
        $this->setDepartmentHandle(new DepartmentHandle());
        $this->setBankPaymentTypeHandle(new PaymentTypeHandle());
        $this->setProjectHandle(new ProjectHandle());
        $this->setContraVatAccountHandle(new AccountHandle());
        $this->setDate(date('c'));

        parent::__construct($soapObject);
    }

    /**
     * @return AccountHandle
     */
    public function getAccountHandle()
    {
        return $this->AccountHandle;
    }

    /**
     * @param AccountHandle $accountHandle
     * @return CashBookEntry
     */
    public function setAccountHandle($accountHandle)
    {
        $this->AccountHandle = $accountHandle;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->Amount;
    }

    /**
     * @param float $amount
     * @return CashBookEntry
     */
    public function setAmount($amount)
    {
        $this->Amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountDefaultCurrency()
    {
        return $this->AmountDefaultCurrency;
    }

    /**
     * @param float $amountDefaultCurrency
     * @return CashBookEntry
     */
    public function setAmountDefaultCurrency($amountDefaultCurrency)
    {
        $this->AmountDefaultCurrency = $amountDefaultCurrency;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankPaymentCreditorId()
    {
        return $this->BankPaymentCreditorId;
    }

    /**
     * @param string $bankPaymentCreditorId
     * @return CashBookEntry
     */
    public function setBankPaymentCreditorId($bankPaymentCreditorId)
    {
        $this->BankPaymentCreditorId = $bankPaymentCreditorId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankPaymentCreditorInvoiceId()
    {
        return $this->BankPaymentCreditorInvoiceId;
    }

    /**
     * @param string $bankPaymentCreditorInvoiceId
     * @return CashBookEntry
     */
    public function setBankPaymentCreditorInvoiceId($bankPaymentCreditorInvoiceId)
    {
        $this->BankPaymentCreditorInvoiceId = $bankPaymentCreditorInvoiceId;

        return $this;
    }

    /**
     * @return PaymentTypeHandle
     */
    public function getBankPaymentTypeHandle()
    {
        return $this->BankPaymentTypeHandle;
    }

    /**
     * @param PaymentTypeHandle $bankPaymentTypeHandle
     * @return CashBookEntry
     */
    public function setBankPaymentTypeHandle($bankPaymentTypeHandle)
    {
        $this->BankPaymentTypeHandle = $bankPaymentTypeHandle;

        return $this;
    }

    /**
     * @return CapitaliseHandle
     */
    public function getCapitaliseHandle()
    {
        return $this->CapitaliseHandle;
    }

    /**
     * @param CapitaliseHandle $capitaliseHandle
     * @return CashBookEntry
     */
    public function setCapitaliseHandle($capitaliseHandle)
    {
        $this->CapitaliseHandle = $capitaliseHandle;

        return $this;
    }

    /**
     * @return CashBookHandle
     */
    public function getCashBookHandle()
    {
        return $this->CashBookHandle;
    }

    /**
     * @param CashBookHandle $cashBookHandle
     * @return CashBookEntry
     */
    public function setCashBookHandle($cashBookHandle)
    {
        $this->CashBookHandle = $cashBookHandle;

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
     * @param AccountHandle $contraAccountHandle
     * @return CashBookEntry
     */
    public function setContraAccountHandle($contraAccountHandle)
    {
        $this->ContraAccountHandle = $contraAccountHandle;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getContraVatAccountHandle()
    {
        return $this->ContraVatAccountHandle;
    }

    /**
     * @param AccountHandle $contraVatAccountHandle
     * @return CashBookEntry
     */
    public function setContraVatAccountHandle($contraVatAccountHandle)
    {
        $this->ContraVatAccountHandle = $contraVatAccountHandle;

        return $this;
    }

    /**
     * @return CostTypeHandle
     */
    public function getCostTypeHandle()
    {
        return $this->CostTypeHandle;
    }

    /**
     * @param CostTypeHandle $costTypeHandle
     * @return CashBookEntry
     */
    public function setCostTypeHandle($costTypeHandle)
    {
        $this->CostTypeHandle = $costTypeHandle;

        return $this;
    }

    /**
     * @return CreditorHandle
     */
    public function getCreditorHandle()
    {
        return $this->CreditorHandle;
    }

    /**
     * @param CreditorHandle $creditorHandle
     * @return CashBookEntry
     */
    public function setCreditorHandle($creditorHandle)
    {
        $this->CreditorHandle = $creditorHandle;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreditorInvoiceNumber()
    {
        return $this->CreditorInvoiceNumber;
    }

    /**
     * @param int $creditorInvoiceNumber
     * @return CashBookEntry
     */
    public function setCreditorInvoiceNumber($creditorInvoiceNumber)
    {
        $this->CreditorInvoiceNumber = $creditorInvoiceNumber;

        return $this;
    }

    /**
     * @return CurrencyHandle
     */
    public function getCurrencyHandle()
    {
        return $this->CurrencyHandle;
    }

    /**
     * @param CurrencyHandle $currencyHandle
     * @return CashBookEntry
     */
    public function setCurrencyHandle($currencyHandle)
    {
        $this->CurrencyHandle = $currencyHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param \DateTime $date
     * @return CashBookEntry
     */
    public function setDate($date)
    {
        $this->Date = $date;

        return $this;
    }

    /**
     * @return DebtorHandle
     */
    public function getDebtorHandle()
    {
        return $this->DebtorHandle;
    }

    /**
     * @param DebtorHandle $debtorHandle
     * @return CashBookEntry
     */
    public function setDebtorHandle($debtorHandle)
    {
        $this->DebtorHandle = $debtorHandle;

        return $this;
    }

    /**
     * @return int
     */
    public function getDebtorInvoiceNumber()
    {
        return $this->DebtorInvoiceNumber;
    }

    /**
     * @param int $debtorInvoiceNumber
     * @return CashBookEntry
     */
    public function setDebtorInvoiceNumber($debtorInvoiceNumber)
    {
        $this->DebtorInvoiceNumber = $debtorInvoiceNumber;

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
     * @param DepartmentHandle $departmentHandle
     * @return CashBookEntry
     */
    public function setDepartmentHandle($departmentHandle)
    {
        $this->DepartmentHandle = $departmentHandle;

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
     * @param DistributionKeyHandle $distributionKeyHandle
     * @return CashBookEntry
     */
    public function setDistributionKeyHandle($distributionKeyHandle)
    {
        $this->DistributionKeyHandle = $distributionKeyHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->DueDate;
    }

    /**
     * @param \DateTime $dueDate
     * @return CashBookEntry
     */
    public function setDueDate($dueDate)
    {
        $this->DueDate = $dueDate;

        return $this;
    }

    /**
     * @return EmployeeHandle
     */
    public function getEmployeeHandle()
    {
        return $this->EmployeeHandle;
    }

    /**
     * @param EmployeeHandle $employeeHandle
     * @return CashBookEntry
     */
    public function setEmployeeHandle($employeeHandle)
    {
        $this->EmployeeHandle = $employeeHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->EndDate;
    }

    /**
     * @param \DateTime $endDate
     * @return CashBookEntry
     */
    public function setEndDate($endDate)
    {
        $this->EndDate = $endDate;

        return $this;
    }

    /**
     * @return CashBookEntryHandle
     */
    public function getHandle()
    {
        return $this->Handle;
    }

    /**
     * @param CashBookEntryHandle $handle
     * @return CashBookEntry
     */
    public function setHandle($handle)
    {
        $this->Handle = $handle;

        return $this;
    }

    /**
     * @return int
     */
    public function getId1()
    {
        return $this->Id1;
    }

    /**
     * @param int $id1
     * @return CashBookEntry
     */
    public function setId1($id1)
    {
        $this->Id1 = $id1;

        return $this;
    }

    /**
     * @return int
     */
    public function getId2()
    {
        return $this->Id2;
    }

    /**
     * @param int $id2
     * @return CashBookEntry
     */
    public function setId2($id2)
    {
        $this->Id2 = $id2;

        return $this;
    }

    /**
     * @return ProjectHandle
     */
    public function getProjectHandle()
    {
        return $this->ProjectHandle;
    }

    /**
     * @param ProjectHandle $projectHandle
     * @return CashBookEntry
     */
    public function setProjectHandle($projectHandle)
    {
        $this->ProjectHandle = $projectHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->StartDate;
    }

    /**
     * @param \DateTime $startDate
     * @return CashBookEntry
     */
    public function setStartDate($startDate)
    {
        $this->StartDate = $startDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->Text;
    }

    /**
     * @param string $text
     * @return CashBookEntry
     */
    public function setText($text)
    {
        $this->Text = $text;

        return $this;
    }

    /**
     * @return CashBookEntryType
     */
    public function getType()
    {
        return $this->Type;
    }

    /**
     * @param CashBookEntryType $type
     * @return CashBookEntry
     */
    public function setType($type)
    {
        $this->Type = $type;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getVatAccountHandle()
    {
        return $this->VatAccountHandle;
    }

    /**
     * @param AccountHandle $vatAccountHandle
     * @return CashBookEntry
     */
    public function setVatAccountHandle($vatAccountHandle)
    {
        $this->VatAccountHandle = $vatAccountHandle;

        return $this;
    }

    /**
     * @return int
     */
    public function getVoucherNumber()
    {
        return $this->VoucherNumber;
    }

    /**
     * @param int $voucherNumber
     * @return CashBookEntry
     */
    public function setVoucherNumber($voucherNumber)
    {
        $this->VoucherNumber = $voucherNumber;

        return $this;
    }


}