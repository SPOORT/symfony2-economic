<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Spoort\Bundle\Symfony2EconomicBundle\Service\SoapApi as SoapApiService;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Debtor as DebtorEntity;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\DebtorHandle as DebtorHandleEntity;

class Debtor
{
    /** @var SoapApiService $soapApiService */
    private $soapApiService;

    /**
     * Debtor constructor.
     * @param SoapApi $soapApiService
     */
    public function __construct(SoapApiService $soapApiService)
    {
        $this->soapApiService = $soapApiService;
    }

    /**
     * Returns handles for debtors with a given Corporate Identification Number
     * @param $number
     * @return CreditorHandleEntity
     */
    public function findDebtorByCiNumber($number)
    {

        return $this->soapApiService
                    ->getConnection()
                    ->Debtor_FindByCINumber(['number' => $number]);
    }

    /**
     * Returns handles for debtors with a given EAN
     * @param $ean
     * @return CreditorHandleEntity
     */
    public function findDebtorByEan($ean)
    {

        return $this->soapApiService
                    ->getConnection()
                    ->Debtor_FindByEan(['ean' => $ean]);
    }

    /**
     * Returns handle for debtors with a given email
     * @param $email
     * @return CreditorHandleEntity
     */
    public function findDebtorByEmail($email)
    {

        return $this->soapApiService
                    ->getConnection()
                    ->Debtor_FindByEmail(['email' => $email]);
    }

    /**
     * Returns handles for debtors with a given name
     * @param $name
     * @return CreditorHandleEntity
     */
    public function findDebtorByName($name)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_FindByName(['name' => $name]);
    }

    /**
     * Returns handle for debtor with a given number
     * @param $number
     * @return CreditorHandleEntity
     */
    public function findDebtorByNumber($number)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_FindByNumber(['number' => $number]);
    }

    /**
     * Returns handles for debtors with a given partial name
     * @param $partialName
     * @return CreditorHandleEntity
     */
    public function findDebtorByPartialName($partialName)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_FindByPartialName(['partialName' => $partialName]);
    }

    /**
     * Returns handle for debtors with a given telephone and fax number
     * @param $telephoneAndFaxNumber
     * @return CreditorHandleEntity
     */
    public function findDebtorByTelephoneAndFaxNumber($telephoneAndFaxNumber)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_FindByTelephoneAndFaxNumber(['telephoneAndFaxNumber' => $telephoneAndFaxNumber]);
    }

    /**
     * Return handles for all debtors
     * @return CreditorHandleEntity
     */
    public function findAllDebtors()
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_GetAll();
    }

    /**
     * Gets the "property" of a debtor
     * @param DebtorHandleEntity $debtorHandleEntity
     * @param $property
     * @return CreditorHandleEntity
     * @throws InvalidArgumentException
     */
    public function getDebtorProperty(DebtorHandleEntity $debtorHandleEntity, $property)
    {
        $propertyList = [
            DebtorEntity::DEBTOR_BALANCE,
            DebtorEntity::DEBTOR_CIN_NUMBER,
            DebtorEntity::DEBTOR_CITY,
            DebtorEntity::DEBTOR_COUNTRY,
            DebtorEntity::DEBTOR_COUNTY,
            DebtorEntity::DEBTOR_EAN,
            DebtorEntity::DEBTOR_EMAIL,
            DebtorEntity::DEBTOR_NAME,
        ];

        if (!in_array($property, $propertyList)) {
            throw new InvalidArgumentException('Provided property is not correct!');
        }

        $method = 'Debtor_Get' . $property;

        return $this->soapApiService
            ->getConnection()
            ->$method(['debtorHandle' => $debtorHandleEntity]);
    }

    /**
     * Returns a debtor data object for a given debtor
     * @param EntityHandleEntity $entityHandleEntity
     * @return CreditorHandleEntity
     */
    public function getDebtorData(EntityHandleEntity $entityHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_GetData(['entityHandle' => $entityHandleEntity]);
    }

    /**
     * Create debtor
     * IMPORTANT: Only VAT_ZONE and IS_ACCESSIBLE are mandatory fields!
     *            All the others are optional (based on SOAP documentation)
     * @param DebtorEntity $debtorEntity
     * @return CreditorHandleEntity
     */
    public function createDebtor(DebtorEntity $debtorEntity)
    {
        $data = [
            // Optional inputs
            DebtorEntity::DEBTOR_HANDLE => $debtorEntity->getHandle(),
            DebtorEntity::DEBTOR_NUMBER => $debtorEntity->getNumber(),
            DebtorEntity::DEBTOR_DEBTOR_GROUP_HANDLE => $debtorEntity->getDebtorGroupHandle(),
            DebtorEntity::DEBTOR_NAME => $debtorEntity->getName(),
            // Mandatory input
            DebtorEntity::DEBTOR_VAT_ZONE => $debtorEntity->getVatZone(),
            // Optional inputs
            DebtorEntity::DEBTOR_EXTENDED_VAT_ZONE => $debtorEntity->getExtendedVatZone(),
            DebtorEntity::DEBTOR_CURRENCY_HANDLE => $debtorEntity->getCurrencyHandle(),
            DebtorEntity::DEBTOR_PRICE_GROUP_HANDLE => $debtorEntity->getPriceGroupHandle(),
            // Mandatory input
            DebtorEntity::DEBTOR_IS_ACCESSIBLE => $debtorEntity->isIsAccessible(),
            // Optional inputs
            DebtorEntity::DEBTOR_EAN => $debtorEntity->getEan(),
            DebtorEntity::DEBTOR_PUBLIC_ENTRY_NUMBER => $debtorEntity->getPublicEntryNumber(),
            DebtorEntity::DEBTOR_EMAIL => $debtorEntity->getEmail(),
            DebtorEntity::DEBTOR_TELEPHONE_AND_FAX_NUMBER => $debtorEntity->getTelephoneAndFaxNumber(),
            DebtorEntity::DEBTOR_WEBSITE => $debtorEntity->getWebsite(),
            DebtorEntity::DEBTOR_ADDRESS => $debtorEntity->getAddress(),
            DebtorEntity::DEBTOR_POSTAL_CODE => $debtorEntity->getPostalCode(),
            DebtorEntity::DEBTOR_CITY => $debtorEntity->getCity(),
            DebtorEntity::DEBTOR_COUNTRY => $debtorEntity->getCountry(),
            DebtorEntity::DEBTOR_CREDIT_MAXIMUM => $debtorEntity->getCreditMaximum(),
            DebtorEntity::DEBTOR_VAT_NUMBER => $debtorEntity->getVatNumber(),
            DebtorEntity::DEBTOR_COUNTY => $debtorEntity->getCounty(),
            DebtorEntity::DEBTOR_CI_NUMBER => $debtorEntity->getCiNumber(),
            DebtorEntity::DEBTOR_TERM_OF_PAYMENT_HANDLE => $debtorEntity->getTermOfPaymentHandle(),
            DebtorEntity::DEBTOR_LAYOUT_HANDLE => $debtorEntity->getLayoutHandle(),
            DebtorEntity::DEBTOR_ATTENTION_HANDLE => $debtorEntity->getAttentionHandle(),
            DebtorEntity::DEBTOR_YOUR_REFERENCE_HANDLE => $debtorEntity->getYourReferenceHandle(),
            DebtorEntity::DEBTOR_OUR_REFERENCE_HANDLE => $debtorEntity->getOurReferenceHandle(),
            DebtorEntity::DEBTOR_BALANCE => $debtorEntity->getBalance(),
            DebtorEntity::DEBTOR_DEFAULT_DELIVERY_LOCATION_HANDLE => $debtorEntity->getDefaultDeliveryLocationHandle()
        ];

        return $this->soapApiService
            ->getConnection()
            ->Debtor_CreateFromData(['data' => $data]);
    }

    /**
     * Update debtor
     * @param DebtorEntity $debtorEntity
     * @return CreditorHandleEntity
     */
    public function updateDebtor(DebtorEntity $debtorEntity)
    {
        $data = [
            // Optional inputs
            DebtorEntity::DEBTOR_HANDLE => $debtorEntity->getHandle(),
            DebtorEntity::DEBTOR_NUMBER => $debtorEntity->getNumber(),
            DebtorEntity::DEBTOR_DEBTOR_GROUP_HANDLE => $debtorEntity->getDebtorGroupHandle(),
            DebtorEntity::DEBTOR_NAME => $debtorEntity->getName(),
            // Mandatory input
            DebtorEntity::DEBTOR_VAT_ZONE => $debtorEntity->getVatZone(),
            // Optional inputs
            DebtorEntity::DEBTOR_EXTENDED_VAT_ZONE => $debtorEntity->getExtendedVatZone(),
            DebtorEntity::DEBTOR_CURRENCY_HANDLE => $debtorEntity->getCurrencyHandle(),
            DebtorEntity::DEBTOR_PRICE_GROUP_HANDLE => $debtorEntity->getPriceGroupHandle(),
            // Mandatory input
            DebtorEntity::DEBTOR_IS_ACCESSIBLE => $debtorEntity->isIsAccessible(),
            // Optional inputs
            DebtorEntity::DEBTOR_EAN => $debtorEntity->getEan(),
            DebtorEntity::DEBTOR_PUBLIC_ENTRY_NUMBER => $debtorEntity->getPublicEntryNumber(),
            DebtorEntity::DEBTOR_EMAIL => $debtorEntity->getEmail(),
            DebtorEntity::DEBTOR_TELEPHONE_AND_FAX_NUMBER => $debtorEntity->getTelephoneAndFaxNumber(),
            DebtorEntity::DEBTOR_WEBSITE => $debtorEntity->getWebsite(),
            DebtorEntity::DEBTOR_ADDRESS => $debtorEntity->getAddress(),
            DebtorEntity::DEBTOR_POSTAL_CODE => $debtorEntity->getPostalCode(),
            DebtorEntity::DEBTOR_CITY => $debtorEntity->getCity(),
            DebtorEntity::DEBTOR_COUNTRY => $debtorEntity->getCountry(),
            DebtorEntity::DEBTOR_CREDIT_MAXIMUM => $debtorEntity->getCreditMaximum(),
            DebtorEntity::DEBTOR_VAT_NUMBER => $debtorEntity->getVatNumber(),
            DebtorEntity::DEBTOR_COUNTY => $debtorEntity->getCounty(),
            DebtorEntity::DEBTOR_CI_NUMBER => $debtorEntity->getCiNumber(),
            DebtorEntity::DEBTOR_TERM_OF_PAYMENT_HANDLE => $debtorEntity->getTermOfPaymentHandle(),
            DebtorEntity::DEBTOR_LAYOUT_HANDLE => $debtorEntity->getLayoutHandle(),
            DebtorEntity::DEBTOR_ATTENTION_HANDLE => $debtorEntity->getAttentionHandle(),
            DebtorEntity::DEBTOR_YOUR_REFERENCE_HANDLE => $debtorEntity->getYourReferenceHandle(),
            DebtorEntity::DEBTOR_OUR_REFERENCE_HANDLE => $debtorEntity->getOurReferenceHandle(),
            DebtorEntity::DEBTOR_BALANCE => $debtorEntity->getBalance(),
            DebtorEntity::DEBTOR_DEFAULT_DELIVERY_LOCATION_HANDLE => $debtorEntity->getDefaultDeliveryLocationHandle()
        ];

        return $this->soapApiService
            ->getConnection()
            ->Debtor_UpdateFromData(['data' => $data]);
    }

    /**
     * Delete debtor
     * @param DebtorHandleEntity $debtorHandleEntity
     * @return CreditorHandleEntity
     */
    public function deleteDebtor(DebtorHandleEntity $debtorHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_Delete(['debtorHandle' => $debtorHandleEntity]);
    }

    /**
     * Creates a new debtor contact
     * @param DebtorHandleEntity $debtorHandleEntity
     * @param $name
     * @return CreditorHandleEntity
     */
    public function createDebtorContact(DebtorHandleEntity $debtorHandleEntity, $name)
    {

        return $this->soapApiService
            ->getConnection()
            ->DebtorContact_Create(['debtorHandle' => $debtorHandleEntity, 'name' => $name]);
    }

    /**
     * Get actual data from the debtor handle
     * @param DebtorHandleEntity $debtorHandleEntity
     * @return mixed
     */
    public function getData(DebtorHandleEntity $debtorHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->Debtor_GetData(['entityHandle' => $debtorHandleEntity])
            ->Debtor_GetDataResult;
    }
}