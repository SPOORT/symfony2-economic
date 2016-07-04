<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AttentionHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CurrencyHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DebtorGroupHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DebtorHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\LayoutHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\LocationHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\OurReferenceHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\PriceGroupHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\TermOfPaymentHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\YourReferenceHandle;

class Debtor extends EconomicSoapEntity
{
    const DEBTOR_HANDLE = 'Handle';
    const DEBTOR_NUMBER = 'Number';
    const DEBTOR_DEBTOR_GROUP_HANDLE = 'DebtorGroupHandle';
    const DEBTOR_NAME = 'Name';
    const DEBTOR_VAT_ZONE = 'VatZone';
    const DEBTOR_EXTENDED_VAT_ZONE = 'ExtendedVatZone';
    const DEBTOR_CURRENCY_HANDLE = 'CurrencyHandle';
    const DEBTOR_PRICE_GROUP_HANDLE = 'PriceGroupHandle';
    const DEBTOR_IS_ACCESSIBLE = 'IsAccessible';
    const DEBTOR_EAN = 'Ean';
    const DEBTOR_PUBLIC_ENTRY_NUMBER = 'PublicEntryNumber';
    const DEBTOR_EMAIL = 'Email';
    const DEBTOR_TELEPHONE_AND_FAX_NUMBER = 'TelephoneAndFaxNumber';
    const DEBTOR_WEBSITE = 'Website';
    const DEBTOR_ADDRESS = 'Address';
    const DEBTOR_POSTAL_CODE = 'PostalCode';
    const DEBTOR_CITY = 'City';
    const DEBTOR_COUNTRY = 'Country';
    const DEBTOR_CREDIT_MAXIMUM = 'CreditMaximum';
    const DEBTOR_VAT_NUMBER = 'VatNumber';
    const DEBTOR_COUNTY = 'County';
    const DEBTOR_CI_NUMBER = 'CINumber';
    const DEBTOR_TERM_OF_PAYMENT_HANDLE = 'TermOfPaymentHandle';
    const DEBTOR_LAYOUT_HANDLE = 'LayoutHandle';
    const DEBTOR_ATTENTION_HANDLE = 'AttentionHandle';
    const DEBTOR_YOUR_REFERENCE_HANDLE = 'YourReferenceHandle';
    const DEBTOR_OUR_REFERENCE_HANDLE = 'OurReferenceHandle';
    const DEBTOR_BALANCE = 'Balance';
    const DEBTOR_DEFAULT_DELIVERY_LOCATION_HANDLE = 'DefaultDeliveryLocationHandle';

    /** @var $handle DebtorHandle */
    private $Handle;

    /** @var $number string */
    private $Number;

    /** @var $debtorGroupHandle DebtorGroupHandle */
    private $DebtorGroupHandle;

    /** @var $name string */
    private $Name;

    /**
     * @see Enum\VatZone
     * @var $vatZone string
     */
    private $VatZone;

    /** @var $extendedVatZone string */
    private $ExtendedVatZone;

    /** @var $currencyHandle CurrencyHandle */
    private $CurrencyHandle;

    /** @var $priceGroupHandle PriceGroupHandle */
    private $PriceGroupHandle;

    /** @var $isAccessible boolean */
    private $IsAccessible;

    /** @var $ean string */
    private $Ean;

    /** @var $publicEntryNumber string */
    private $PublicEntryNumber;

    /** @var $email string */
    private $Email;

    /** @var $telephoneAndFaxNumber string */
    private $TelephoneAndFaxNumber;

    /** @var $website string */
    private $Website;

    /** @var $address string */
    private $Address;

    /** @var $postalCode string */
    private $PostalCode;

    /** @var $city string */
    private $City;

    /** @var $country string */
    private $Country;

    /** @var $creditMaximum float */
    private $CreditMaximum;

    /** @var $vatNumber string */
    private $VatNumber;

    /** @var $county string */
    private $County;

    /** @var $ciNumber string */
    private $CiNumber;

    /** @var $termOfPaymentHandle TermOfPaymentHandle */
    private $TermOfPaymentHandle;

    /** @var $layoutHandle LayoutHandle */
    private $LayoutHandle;

    /** @var $attentionHandle AttentionHandle */
    private $AttentionHandle;

    /** @var $yourReferenceHandle YourReferenceHandle */
    private $YourReferenceHandle;

    /** @var $ourReferenceHandle OurReferenceHandle */
    private $OurReferenceHandle;

    /** @var $balance float */
    private $Balance;

    /** @var $defaultDeliveryLocationHandle LocationHandle */
    private $DefaultDeliveryLocationHandle;

    /**
     * Creditor constructor.
     * @param null $soapObject
     */
    public function __construct($soapObject = null)
    {
        $this->setHandle(new DebtorHandle());
        $this->setDebtorGroupHandle(new DebtorGroupHandle());
        $this->setAttentionHandle(new AttentionHandle());
        $this->setCurrencyHandle(new CurrencyHandle());
        $this->setOurReferenceHandle(new OurReferenceHandle());
        $this->setYourReferenceHandle(new YourReferenceHandle());
        $this->setTermOfPaymentHandle(new TermOfPaymentHandle());
        $this->setLayoutHandle(new LayoutHandle());
        $this->setPriceGroupHandle(new PriceGroupHandle());
        $this->setDefaultDeliveryLocationHandle(new LocationHandle());

        parent::__construct($soapObject);
    }

    /**
     * @return DebtorHandle
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param DebtorHandle $handle
     * @return Debtor
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
     * @return Debtor
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return DebtorGroupHandle
     */
    public function getDebtorGroupHandle()
    {
        return $this->debtorGroupHandle;
    }

    /**
     * @param DebtorGroupHandle $debtorGroupHandle
     * @return Debtor
     */
    public function setDebtorGroupHandle($debtorGroupHandle)
    {
        $this->debtorGroupHandle = $debtorGroupHandle;

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
     * @return Debtor
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
     * @return Debtor
     */
    public function setVatZone($vatZone)
    {
        $this->vatZone = $vatZone;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtendedVatZone()
    {
        return $this->extendedVatZone;
    }

    /**
     * @param string $extendedVatZone
     * @return Debtor
     */
    public function setExtendedVatZone($extendedVatZone)
    {
        $this->extendedVatZone = $extendedVatZone;

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
     * @return Debtor
     */
    public function setCurrencyHandle($currencyHandle)
    {
        $this->currencyHandle = $currencyHandle;

        return $this;
    }

    /**
     * @return PriceGroupHandle
     */
    public function getPriceGroupHandle()
    {
        return $this->priceGroupHandle;
    }

    /**
     * @param PriceGroupHandle $priceGroupHandle
     * @return Debtor
     */
    public function setPriceGroupHandle($priceGroupHandle)
    {
        $this->priceGroupHandle = $priceGroupHandle;

        return $this;
    }

    /**
     * @return boolean
     */
    public function isIsAccessible()
    {
        return $this->isAccessible;
    }

    /**
     * @param boolean $isAccessible
     * @return Debtor
     */
    public function setIsAccessible($isAccessible)
    {
        $this->isAccessible = $isAccessible;

        return $this;
    }

    /**
     * @return string
     */
    public function getEan()
    {
        return $this->ean;
    }

    /**
     * @param string $ean
     * @return Debtor
     */
    public function setEan($ean)
    {
        $this->ean = $ean;

        return $this;
    }

    /**
     * @return string
     */
    public function getPublicEntryNumber()
    {
        return $this->publicEntryNumber;
    }

    /**
     * @param string $publicEntryNumber
     * @return Debtor
     */
    public function setPublicEntryNumber($publicEntryNumber)
    {
        $this->publicEntryNumber = $publicEntryNumber;

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
     * @return Debtor
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getTelephoneAndFaxNumber()
    {
        return $this->telephoneAndFaxNumber;
    }

    /**
     * @param string $telephoneAndFaxNumber
     * @return Debtor
     */
    public function setTelephoneAndFaxNumber($telephoneAndFaxNumber)
    {
        $this->telephoneAndFaxNumber = $telephoneAndFaxNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * @param string $website
     * @return Debtor
     */
    public function setWebsite($website)
    {
        $this->website = $website;

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
     * @return Debtor
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
     * @return Debtor
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
     * @return Debtor
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
     * @return Debtor
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return float
     */
    public function getCreditMaximum()
    {
        return $this->creditMaximum;
    }

    /**
     * @param float $creditMaximum
     * @return Debtor
     */
    public function setCreditMaximum($creditMaximum)
    {
        $this->creditMaximum = $creditMaximum;

        return $this;
    }

    /**
     * @return string
     */
    public function getVatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @param string $vatNumber
     * @return Debtor
     */
    public function setVatNumber($vatNumber)
    {
        $this->vatNumber = $vatNumber;

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
     * @return Debtor
     */
    public function setCounty($county)
    {
        $this->county = $county;

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
     * @return Debtor
     */
    public function setCiNumber($ciNumber)
    {
        $this->ciNumber = $ciNumber;

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
     * @return Debtor
     */
    public function setTermOfPaymentHandle($termOfPaymentHandle)
    {
        $this->termOfPaymentHandle = $termOfPaymentHandle;

        return $this;
    }

    /**
     * @return LayoutHandle
     */
    public function getLayoutHandle()
    {
        return $this->layoutHandle;
    }

    /**
     * @param LayoutHandle $layoutHandle
     * @return Debtor
     */
    public function setLayoutHandle($layoutHandle)
    {
        $this->layoutHandle = $layoutHandle;

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
     * @return Debtor
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
     * @return Debtor
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
     * @return Debtor
     */
    public function setOurReferenceHandle($ourReferenceHandle)
    {
        $this->ourReferenceHandle = $ourReferenceHandle;

        return $this;
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
     * @return Debtor
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * @return LocationHandle
     */
    public function getDefaultDeliveryLocationHandle()
    {
        return $this->defaultDeliveryLocationHandle;
    }

    /**
     * @param LocationHandle $defaultDeliveryLocationHandle
     * @return Debtor
     */
    public function setDefaultDeliveryLocationHandle($defaultDeliveryLocationHandle)
    {
        $this->defaultDeliveryLocationHandle = $defaultDeliveryLocationHandle;

        return $this;
    }
}