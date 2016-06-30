<?php
/**
 * This file is part of SPOORT International ApS
 * and belongs to SPOORT International ApS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Spoort\Bundle\Symfony2EconomicBundle\Entity;


use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AccountHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AttentionHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorGroupHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CurrencyHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DebtorGroupHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DebtorHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\LayoutHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\LocationHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\OurReferenceHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\PaymentTypeHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\PriceGroupHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\TermOfPaymentHandle;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\YourReferenceHandle;

class Debtor
{
    /** @var $handle DebtorHandle */
    private $handle;

    /** @var $number string */
    private $number;

    /** @var $debtorGroupHandle DebtorGroupHandle */
    private $debtorGroupHandle;

    /** @var $name string */
    private $name;

    /**
     * @see Enum\VatZone
     * @var $vatZone string
     */
    private $vatZone;

    /** @var $extendedVatZone string */
    private $extendedVatZone;

    /** @var $currencyHandle CurrencyHandle */
    private $currencyHandle;

    /** @var $priceGroupHandle PriceGroupHandle */
    private $priceGroupHandle;

    /** @var $isAccessible boolean */
    private $isAccessible;

    /** @var $ean string */
    private $ean;

    /** @var $publicEntryNumber string */
    private $publicEntryNumber;

    /** @var $email string */
    private $email;

    /** @var $telephoneAndFaxNumber string */
    private $telephoneAndFaxNumber;

    /** @var $website string */
    private $website;

    /** @var $address string */
    private $address;

    /** @var $postalCode string */
    private $postalCode;

    /** @var $city string */
    private $city;

    /** @var $country string */
    private $country;

    /** @var $creditMaximum float */
    private $creditMaximum;

    /** @var $vatNumber string */
    private $vatNumber;

    /** @var $county string */
    private $county;

    /** @var $ciNumber string */
    private $ciNumber;

    /** @var $termOfPaymentHandle TermOfPaymentHandle */
    private $termOfPaymentHandle;

    /** @var $layoutHandle LayoutHandle */
    private $layoutHandle;

    /** @var $attentionHandle AttentionHandle */
    private $attentionHandle;

    /** @var $yourReferenceHandle YourReferenceHandle */
    private $yourReferenceHandle;

    /** @var $ourReferenceHandle OurReferenceHandle */
    private $ourReferenceHandle;

    /** @var $balance float */
    private $balance;

    /** @var $defaultDeliveryLocationHandle LocationHandle */
    private $defaultDeliveryLocationHandle;

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