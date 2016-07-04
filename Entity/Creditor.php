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

class Creditor extends EconomicSoapEntity
{
    const CREDITOR_HANDLE = 'Handle';
    const CREDITOR_NUMBER = 'Number';
    const CREDITOR_CREDITOR_GROUP_HANDLE = 'CreditorGroupHandle';
    const CREDITOR_NAME = 'Name';
    const CREDITOR_VAT_ZONE = 'VatZone';
    const CREDITOR_CURRENCY_HANDLE = 'CurrencyHandle';
    const CREDITOR_TERM_OF_PAYMENT_HANDLE = 'TermOfPaymentHandle';
    const CREDITOR_IS_ACCESSIBLE = 'IsAccessible';
    const CREDITOR_CI_NUMBER = 'CINumber';
    const CREDITOR_EMAIL = 'Email';
    const CREDITOR_ADDRESS = 'Address';
    const CREDITOR_POSTAL_CODE = 'PostalCode';
    const CREDITOR_CITY = 'City';
    const CREDITOR_COUNTRY = 'Country';
    const CREDITOR_BANK_ACCOUNT = 'BankAccount';
    const CREDITOR_ATTENTION_HANDLE = 'AttentionHandle';
    const CREDITOR_YOUR_REFERENCE_HANDLE = 'YourReferenceHandle';
    const CREDITOR_OUR_REFERENCE_HANDLE = 'OurReferenceHandle';
    const CREDITOR_DEFAULT_PAYMENT_TYPE_HANDLE = 'DefaultPaymentTypeHandle';
    const CREDITOR_DEFAULT_PAYMENT_CREDITOR_ID_HANDLE = 'DefaultPaymentCreditorId';
    const CREDITOR_COUNTY = 'County';
    const CREDITOR_AUTO_CONTRA_ACCOUNT_HANDLE = 'AutoContraAccountHandle';
    const CREDITOR_DEFAULT_INVOICE_TEXT = 'DefaultInvoiceText';

    /** @var $handle CreditorHandle */
    private $Handle;

    /** @var $number string */
    private $Number;

    /** @var $creditorGroupHandle CreditorGroupHandle */
    private $CreditorGroupHandle;

    /** @var $name string */
    private $Name;

    /**
     * @see Enum\VatZone
     * @var $vatZone string
     */
    private $VatZone;

    /** @var $currencyHandle CurrencyHandle */
    private $CurrencyHandle;

    /** @var $termOfPaymentHandle TermOfPaymentHandle */
    private $TermOfPaymentHandle;

    /** @var $isAccessible boolean */
    private $IsAccessible;

    /** @var $ciNumber string */
    private $CiNumber;

    /** @var $email string */
    private $Email;

    /** @var $address string */
    private $Address;

    /** @var $postalCode string */
    private $PostalCode;

    /** @var $city string */
    private $City;

    /** @var $country string */
    private $Country;

    /** @var $bankAccount string */
    private $BankAccount;

    /** @var $attentionHandle AttentionHandle */
    private $AttentionHandle;

    /** @var $yourReferenceHandle YourReferenceHandle */
    private $YourReferenceHandle;

    /** @var $ourReferenceHandle OurReferenceHandle */
    private $OurReferenceHandle;

    /** @var $defaultPaymentTypeHandle PaymentTypeHandle */
    private $DefaultPaymentTypeHandle;

    /** @var $county string */
    private $County;

    /** @var $autoContraAccountHandle AccountHandle */
    private $AutoContraAccountHandle;

    /** @var $defaultInvoiceText string */
    private $DefaultInvoiceText;

    /** @var integer $defaultPaymentCreditorId */
    private $DefaultPaymentCreditorId;

    /**
     * Creditor constructor.
     * @param null $soapObject
     */
    public function __construct($soapObject = null)
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

        parent::__construct($soapObject);
    }

    /**
     * @return CreditorHandle
     */
    public function getHandle()
    {
        return $this->Handle;
    }

    /**
     * @param CreditorHandle $handle
     * @return Creditor
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
     * @return Creditor
     */
    public function setNumber($number)
    {
        $this->Number = $number;

        return $this;
    }

    /**
     * @return CreditorGroupHandle
     */
    public function getCreditorGroupHandle()
    {
        return $this->CreditorGroupHandle;
    }

    /**
     * @param CreditorGroupHandle $creditorGroupHandle
     * @return Creditor
     */
    public function setCreditorGroupHandle($creditorGroupHandle)
    {
        $this->CreditorGroupHandle = $creditorGroupHandle;

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
     * @return Creditor
     */
    public function setName($name)
    {
        $this->Name = $name;

        return $this;
    }

    /**
     * @see Enum\VatZone
     * @return string
     */
    public function getVatZone()
    {
        return $this->VatZone;
    }

    /**
     * @see Enum\VatZone
     * @param string $vatZone
     * @return Creditor
     */
    public function setVatZone($vatZone)
    {
        $this->VatZone = $vatZone;

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
     * @return Creditor
     */
    public function setCurrencyHandle($currencyHandle)
    {
        $this->CurrencyHandle = $currencyHandle;

        return $this;
    }

    /**
     * @return TermOfPaymentHandle
     */
    public function getTermOfPaymentHandle()
    {
        return $this->TermOfPaymentHandle;
    }

    /**
     * @param TermOfPaymentHandle $termOfPaymentHandle
     * @return Creditor
     */
    public function setTermOfPaymentHandle($termOfPaymentHandle)
    {
        $this->TermOfPaymentHandle = $termOfPaymentHandle;

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
     * @param boolean $isAccessible
     * @return Creditor
     */
    public function setIsAccessible($isAccessible)
    {
        $this->IsAccessible = $isAccessible;

        return $this;
    }

    /**
     * @return string
     */
    public function getCiNumber()
    {
        return $this->CiNumber;
    }

    /**
     * @param string $ciNumber
     * @return Creditor
     */
    public function setCiNumber($ciNumber)
    {
        $this->CiNumber = $ciNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $email
     * @return Creditor
     */
    public function setEmail($email)
    {
        $this->Email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @param string $address
     * @return Creditor
     */
    public function setAddress($address)
    {
        $this->Address = $address;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->PostalCode;
    }

    /**
     * @param string $postalCode
     * @return Creditor
     */
    public function setPostalCode($postalCode)
    {
        $this->PostalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->City;
    }

    /**
     * @param string $city
     * @return Creditor
     */
    public function setCity($city)
    {
        $this->City = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @param string $country
     * @return Creditor
     */
    public function setCountry($country)
    {
        $this->Country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getBankAccount()
    {
        return $this->BankAccount;
    }

    /**
     * @param string $bankAccount
     * @return Creditor
     */
    public function setBankAccount($bankAccount)
    {
        $this->BankAccount = $bankAccount;

        return $this;
    }

    /**
     * @return AttentionHandle
     */
    public function getAttentionHandle()
    {
        return $this->AttentionHandle;
    }

    /**
     * @param AttentionHandle $attentionHandle
     * @return Creditor
     */
    public function setAttentionHandle($attentionHandle)
    {
        $this->AttentionHandle = $attentionHandle;

        return $this;
    }

    /**
     * @return YourReferenceHandle
     */
    public function getYourReferenceHandle()
    {
        return $this->YourReferenceHandle;
    }

    /**
     * @param YourReferenceHandle $yourReferenceHandle
     * @return Creditor
     */
    public function setYourReferenceHandle($yourReferenceHandle)
    {
        $this->YourReferenceHandle = $yourReferenceHandle;

        return $this;
    }

    /**
     * @return OurReferenceHandle
     */
    public function getOurReferenceHandle()
    {
        return $this->OurReferenceHandle;
    }

    /**
     * @param OurReferenceHandle $ourReferenceHandle
     * @return Creditor
     */
    public function setOurReferenceHandle($ourReferenceHandle)
    {
        $this->OurReferenceHandle = $ourReferenceHandle;

        return $this;
    }

    /**
     * @return PaymentTypeHandle
     */
    public function getDefaultPaymentTypeHandle()
    {
        return $this->DefaultPaymentTypeHandle;
    }

    /**
     * @param PaymentTypeHandle $defaultPaymentTypeHandle
     * @return Creditor
     */
    public function setDefaultPaymentTypeHandle($defaultPaymentTypeHandle)
    {
        $this->DefaultPaymentTypeHandle = $defaultPaymentTypeHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getCounty()
    {
        return $this->County;
    }

    /**
     * @param string $county
     * @return Creditor
     */
    public function setCounty($county)
    {
        $this->County = $county;

        return $this;
    }

    /**
     * @return AccountHandle
     */
    public function getAutoContraAccountHandle()
    {
        return $this->AutoContraAccountHandle;
    }

    /**
     * @param AccountHandle $autoContraAccountHandle
     * @return Creditor
     */
    public function setAutoContraAccountHandle($autoContraAccountHandle)
    {
        $this->AutoContraAccountHandle = $autoContraAccountHandle;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultInvoiceText()
    {
        return $this->DefaultInvoiceText;
    }

    /**
     * @param string $defaultInvoiceText
     * @return Creditor
     */
    public function setDefaultInvoiceText($defaultInvoiceText)
    {
        $this->DefaultInvoiceText = $defaultInvoiceText;

        return $this;
    }

    /**
     * @return int
     */
    public function getDefaultPaymentCreditorId()
    {
        return $this->DefaultPaymentCreditorId;
    }

    /**
     * @param int $defaultPaymentCreditorId
     * @return Creditor
     */
    public function setDefaultPaymentCreditorId($defaultPaymentCreditorId)
    {
        $this->DefaultPaymentCreditorId = $defaultPaymentCreditorId;

        return $this;
    }
}