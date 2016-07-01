<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AccountHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AttentionHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorGroupHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CurrencyHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\OurReferenceHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\PaymentTypeHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\TermOfPaymentHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\YourReferenceHandle;

class Creditor
{
    /** @var $handle CreditorHandle */
    private $handle;

    /** @var $number string */
    private $number;

    /** @var $creditorGroupHandle CreditorGroupHandle */
    private $creditorGroupHandle;

    /** @var $name string */
    private $name;

    /**
     * @see Enum\VatZone
     * @var $vatZone string
     */
    private $vatZone;

    /** @var $currencyHandle CurrencyHandle */
    private $currencyHandle;

    /** @var $termOfPaymentHandle TermOfPaymentHandle */
    private $termOfPaymentHandle;

    /** @var $isAccessible boolean */
    private $isAccessible;

    /** @var $ciNumber string */
    private $ciNumber;

    /** @var $email string */
    private $email;

    /** @var $address string */
    private $address;

    /** @var $postalCode string */
    private $postalCode;

    /** @var $city string */
    private $city;

    /** @var $country string */
    private $country;

    /** @var $bankAccount string */
    private $bankAccount;

    /** @var $attentionHandle AttentionHandle */
    private $attentionHandle;

    /** @var $yourReferenceHandle YourReferenceHandle */
    private $yourReferenceHandle;

    /** @var $ourReferenceHandle OurReferenceHandle */
    private $ourReferenceHandle;

    /** @var $defaultPaymentTypeHandle PaymentTypeHandle */
    private $defaultPaymentTypeHandle;

    /** @var $county string */
    private $county;

    /** @var $autoContraAccountHandle AccountHandle */
    private $autoContraAccountHandle;

    /** @var $defaultInvoiceText string */
    private $defaultInvoiceText;

    /**
     * Creditor constructor.
     */
    public function __construct()
    {
        $this->setHandle(new CreditorHandle());
        $this->setAttentionHandle(new AttentionHandle());
        $this->setCurrencyHandle(new CurrencyHandle());
        $this->setCreditorGroupHandle(new CreditorGroupHandle());
        $this->setOurReferenceHandle(new OurReferenceHandle());
        $this->setYourReferenceHandle(new YourReferenceHandle());
        $this->setAutoContraAccountHandle(new AccountHandle());
        $this->setDefaultPaymentTypeHandle(new PaymentTypeHandle());
        $this->setTermOfPaymentHandle(new TermOfPaymentHandle());
    }

    /**
     * @return CreditorHandle
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param CreditorHandle $handle
     * @return Creditor
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
     * @return Creditor
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return CreditorGroupHandle
     */
    public function getCreditorGroupHandle()
    {
        return $this->creditorGroupHandle;
    }

    /**
     * @param CreditorGroupHandle $creditorGroupHandle
     * @return Creditor
     */
    public function setCreditorGroupHandle($creditorGroupHandle)
    {
        $this->creditorGroupHandle = $creditorGroupHandle;

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
     * @return Creditor
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @see Enum\VatZone
     * @return string
     */
    public function getVatZone()
    {
        return $this->vatZone;
    }

    /**
     * @see Enum\VatZone
     * @param string $vatZone
     * @return Creditor
     */
    public function setVatZone($vatZone)
    {
        $this->vatZone = $vatZone;

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
     * @return Creditor
     */
    public function setCurrencyHandle($currencyHandle)
    {
        $this->currencyHandle = $currencyHandle;

        return $this;
    }

    /**
     * @return TermOfPaymentHandle
     */
    public function getTermOfPaymentHandle()
    {
        return $this->termOfPaymentHandle;
    }

    /**
     * @param TermOfPaymentHandle $termOfPaymentHandle
     * @return Creditor
     */
    public function setTermOfPaymentHandle($termOfPaymentHandle)
    {
        $this->termOfPaymentHandle = $termOfPaymentHandle;

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
     * @return Creditor
     */
    public function setIsAccessible($isAccessible)
    {
        $this->isAccessible = $isAccessible;

        return $this;
    }

    /**
     * @return string
     */
    public function getCiNumber()
    {
        return $this->ciNumber;
    }

    /**
     * @param string $ciNumber
     * @return Creditor
     */
    public function setCiNumber($ciNumber)
    {
        $this->ciNumber = $ciNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return Creditor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return Creditor
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     * @return Creditor
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Creditor
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Creditor
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param string $bankAccount
     * @return Creditor
     */
    public function setBankAccount($bankAccount)
    {
        $this->bankAccount = $bankAccount;

        return $this;
    }

    /**
     * @return AttentionHandle
     */
    public function getAttentionHandle()
    {
        return $this->attentionHandle;
    }

    /**
     * @param AttentionHandle $attentionHandle
     * @return Creditor
     */
    public function setAttentionHandle($attentionHandle)
    {
        $this->attentionHandle = $attentionHandle;

        return $this;
    }

    /**
     * @return YourReferenceHandle
     */
    public function getYourReferenceHandle()
    {
        return $this->yourReferenceHandle;
    }

    /**
     * @param YourReferenceHandle $yourReferenceHandle
     * @return Creditor
     */
    public function setYourReferenceHandle($yourReferenceHandle)
    {
        $this->yourReferenceHandle = $yourReferenceHandle;

        return $this;
    }

    /**
     * @return OurReferenceHandle
     */
    public function getOurReferenceHandle()
    {
        return $this->ourReferenceHandle;
    }

    /**
     * @param OurReferenceHandle $ourReferenceHandle
     * @return Creditor
     */
    public function setOurReferenceHandle($ourReferenceHandle)
    {
        $this->ourReferenceHandle = $ourReferenceHandle;

        return $this;
    }

    /**
     * @return PaymentTypeHandle
     */
    public function getDefaultPaymentTypeHandle()
    {
        return $this->defaultPaymentTypeHandle;
    }

    /**
     * @param PaymentTypeHandle $defaultPaymentTypeHandle
     * @return Creditor
     */
    public function setDefaultPaymentTypeHandle($defaultPaymentTypeHandle)
    {
        $this->defaultPaymentTypeHandle = $defaultPaymentTypeHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * @param string $county
     * @return Creditor
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getAutoContraAccountHandle()
    {
        return $this->autoContraAccountHandle;
    }

    /**
     * @param AccountHandle $autoContraAccountHandle
     * @return Creditor
     */
    public function setAutoContraAccountHandle($autoContraAccountHandle)
    {
        $this->autoContraAccountHandle = $autoContraAccountHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultInvoiceText()
    {
        return $this->defaultInvoiceText;
    }

    /**
     * @param string $defaultInvoiceText
     * @return Creditor
     */
    public function setDefaultInvoiceText($defaultInvoiceText)
    {
        $this->defaultInvoiceText = $defaultInvoiceText;

        return $this;
    }


}