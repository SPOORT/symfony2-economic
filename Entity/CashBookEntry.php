<?php
/**
 * This file is part of SPOORT International ApS
 * and belongs to SPOORT International ApS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


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

class CashBookEntry
{
    /** @var $handle CashBookEntryHandle */
    private $handle;

    /** @var $id1 integer */
    private $id1;

    /** @var $id2 integer */
    private $id2;

    /** @var $type CashBookEntryType */
    private $type;

    /** @var $cashBookHandle CashBookHandle */
    private $cashBookHandle;

    /** @var $debtorHandle DebtorHandle */
    private $debtorHandle;

    /** @var $creditorHandle CreditorHandle */
    private $creditorHandle;

    /** @var $accountHandle AccountHandle  */
    private $account;

    /** @var $contraAccountHandle AccountHandle */
    private $contraAccountHandle;

    /** @var $dateTime \DateTime */
    private $dateTime;

    /** @var $voucherNumber integer */
    private $voucherNumber;

    /** @var $text string */
    private $text;

    /** @var $amountDefaultCurrency float */
    private $amountDefaultCurrency;

    /** @var $currencyHandle CurrencyHandle */
    private $currencyHandle;

    /** @var $amount float */
    private $amount;

    /** @var $vatAccountHandle AccountHandle */
    private $vatAccountHandle;

    /** @var $contraVatAccountHandle AccountHandle */
    private $contraVatAccountHandle;

    /** @var $debtorInvoiceNumber integer */
    private $debtorInvoiceNumber;

    /** @var $creditorInvoiceNumber integer */
    private $creditorInvoiceNumber;

    /** @var $dueDate \DateTime */
    private $dueDate;

    /** @var $departmentHandle DepartmentHandle */
    private $departmentHandle;

    /** @var $distributionKeyHandle DistributionKeyHandle */
    private $distributionKeyHandle;

    /** @var $projectHandle ProjectHandle */
    private $projectHandle;

    /** @var $costTypeHandle CostTypeHandle */
    private $costTypeHandle;

    /** @var $bankPaymentTypeHandle PaymentTypeHandle */
    private $bankPaymentTypeHandle;

    /** @var $bankPaymentCreditorId string */
    private $bankPaymentCreditorId;

    /** @var $bankPaymentCreditorInvoiceId string */
    private $bankPaymentCreditorInvoiceId;

    /** @var $capitaliseHandle CapitaliseHandle */
    private $capitaliseHandle;

    /** @var $startDate \DateTime */
    private $startDate;

    /** @var $endDate \DateTime */
    private $endDate;

    /** @var $employeeHandle EmployeeHandle */
    private $employeeHandle;

    /**
     * @return AccountHandle
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param AccountHandle $account
     * @return CashBookEntry
     */
    public function setAccount($account)
    {
        $this->account = $account;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param float $amount
     * @return CashBookEntry
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return float
     */
    public function getAmountDefaultCurrency()
    {
        return $this->amountDefaultCurrency;
    }

    /**
     * @param float $amountDefaultCurrency
     * @return CashBookEntry
     */
    public function setAmountDefaultCurrency($amountDefaultCurrency)
    {
        $this->amountDefaultCurrency = $amountDefaultCurrency;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankPaymentCreditorId()
    {
        return $this->bankPaymentCreditorId;
    }

    /**
     * @param string $bankPaymentCreditorId
     * @return CashBookEntry
     */
    public function setBankPaymentCreditorId($bankPaymentCreditorId)
    {
        $this->bankPaymentCreditorId = $bankPaymentCreditorId;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankPaymentCreditorInvoiceId()
    {
        return $this->bankPaymentCreditorInvoiceId;
    }

    /**
     * @param string $bankPaymentCreditorInvoiceId
     * @return CashBookEntry
     */
    public function setBankPaymentCreditorInvoiceId($bankPaymentCreditorInvoiceId)
    {
        $this->bankPaymentCreditorInvoiceId = $bankPaymentCreditorInvoiceId;

        return $this;
    }

    /**
     * @return PaymentTypeHandle
     */
    public function getBankPaymentTypeHandle()
    {
        return $this->bankPaymentTypeHandle;
    }

    /**
     * @param PaymentTypeHandle $bankPaymentTypeHandle
     * @return CashBookEntry
     */
    public function setBankPaymentTypeHandle($bankPaymentTypeHandle)
    {
        $this->bankPaymentTypeHandle = $bankPaymentTypeHandle;

        return $this;
    }

    /**
     * @return CapitaliseHandle
     */
    public function getCapitaliseHandle()
    {
        return $this->capitaliseHandle;
    }

    /**
     * @param CapitaliseHandle $capitaliseHandle
     * @return CashBookEntry
     */
    public function setCapitaliseHandle($capitaliseHandle)
    {
        $this->capitaliseHandle = $capitaliseHandle;

        return $this;
    }

    /**
     * @return CashBookHandle
     */
    public function getCashBookHandle()
    {
        return $this->cashBookHandle;
    }

    /**
     * @param CashBookHandle $cashBookHandle
     * @return CashBookEntry
     */
    public function setCashBookHandle($cashBookHandle)
    {
        $this->cashBookHandle = $cashBookHandle;

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
     * @return CashBookEntry
     */
    public function setContraAccountHandle($contraAccountHandle)
    {
        $this->contraAccountHandle = $contraAccountHandle;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getContraVatAccountHandle()
    {
        return $this->contraVatAccountHandle;
    }

    /**
     * @param AccountHandle $contraVatAccountHandle
     * @return CashBookEntry
     */
    public function setContraVatAccountHandle($contraVatAccountHandle)
    {
        $this->contraVatAccountHandle = $contraVatAccountHandle;

        return $this;
    }

    /**
     * @return CostTypeHandle
     */
    public function getCostTypeHandle()
    {
        return $this->costTypeHandle;
    }

    /**
     * @param CostTypeHandle $costTypeHandle
     * @return CashBookEntry
     */
    public function setCostTypeHandle($costTypeHandle)
    {
        $this->costTypeHandle = $costTypeHandle;

        return $this;
    }

    /**
     * @return CreditorHandle
     */
    public function getCreditorHandle()
    {
        return $this->creditorHandle;
    }

    /**
     * @param CreditorHandle $creditorHandle
     * @return CashBookEntry
     */
    public function setCreditorHandle($creditorHandle)
    {
        $this->creditorHandle = $creditorHandle;

        return $this;
    }

    /**
     * @return int
     */
    public function getCreditorInvoiceNumber()
    {
        return $this->creditorInvoiceNumber;
    }

    /**
     * @param int $creditorInvoiceNumber
     * @return CashBookEntry
     */
    public function setCreditorInvoiceNumber($creditorInvoiceNumber)
    {
        $this->creditorInvoiceNumber = $creditorInvoiceNumber;

        return $this;
    }

    /**
     * @return CurrencyHandle
     */
    public function getCurrencyHandle()
    {
        return $this->currencyHandle;
    }

    /**
     * @param CurrencyHandle $currencyHandle
     * @return CashBookEntry
     */
    public function setCurrencyHandle($currencyHandle)
    {
        $this->currencyHandle = $currencyHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * @param \DateTime $dateTime
     * @return CashBookEntry
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * @return DebtorHandle
     */
    public function getDebtorHandle()
    {
        return $this->debtorHandle;
    }

    /**
     * @param DebtorHandle $debtorHandle
     * @return CashBookEntry
     */
    public function setDebtorHandle($debtorHandle)
    {
        $this->debtorHandle = $debtorHandle;

        return $this;
    }

    /**
     * @return int
     */
    public function getDebtorInvoiceNumber()
    {
        return $this->debtorInvoiceNumber;
    }

    /**
     * @param int $debtorInvoiceNumber
     * @return CashBookEntry
     */
    public function setDebtorInvoiceNumber($debtorInvoiceNumber)
    {
        $this->debtorInvoiceNumber = $debtorInvoiceNumber;

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
     * @return CashBookEntry
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
     * @return CashBookEntry
     */
    public function setDistributionKeyHandle($distributionKeyHandle)
    {
        $this->distributionKeyHandle = $distributionKeyHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param \DateTime $dueDate
     * @return CashBookEntry
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * @return EmployeeHandle
     */
    public function getEmployeeHandle()
    {
        return $this->employeeHandle;
    }

    /**
     * @param EmployeeHandle $employeeHandle
     * @return CashBookEntry
     */
    public function setEmployeeHandle($employeeHandle)
    {
        $this->employeeHandle = $employeeHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     * @return CashBookEntry
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * @return CashBookEntryHandle
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param CashBookEntryHandle $handle
     * @return CashBookEntry
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;

        return $this;
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
     * @return CashBookEntry
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
     * @return CashBookEntry
     */
    public function setId2($id2)
    {
        $this->id2 = $id2;

        return $this;
    }

    /**
     * @return ProjectHandle
     */
    public function getProjectHandle()
    {
        return $this->projectHandle;
    }

    /**
     * @param ProjectHandle $projectHandle
     * @return CashBookEntry
     */
    public function setProjectHandle($projectHandle)
    {
        $this->projectHandle = $projectHandle;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     * @return CashBookEntry
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     * @return CashBookEntry
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return CashBookEntryType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param CashBookEntryType $type
     * @return CashBookEntry
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getVatAccountHandle()
    {
        return $this->vatAccountHandle;
    }

    /**
     * @param AccountHandle $vatAccountHandle
     * @return CashBookEntry
     */
    public function setVatAccountHandle($vatAccountHandle)
    {
        $this->vatAccountHandle = $vatAccountHandle;

        return $this;
    }

    /**
     * @return int
     */
    public function getVoucherNumber()
    {
        return $this->voucherNumber;
    }

    /**
     * @param int $voucherNumber
     * @return CashBookEntry
     */
    public function setVoucherNumber($voucherNumber)
    {
        $this->voucherNumber = $voucherNumber;

        return $this;
    }


}