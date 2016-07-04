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
     * @return DebtorHandleEntity[]
     */
    public function findDebtorsByCiNumber($number)
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Debtor_FindByCiNumber(['number' => $number])
            ->Debtor_FindByCiNumberResult;

        if (!empty((array) $data)) {
            if (is_array($data->DebtorHandle)) {
                // It's a collection of objects
                foreach ($data->DebtorHandle as $d) {
                    $results[] = new DebtorHandleEntity($d);
                }
            } else {
                // Single object
                $results[] = new DebtorHandleEntity($data->DebtorHandle);
            }
        }

        return $results;
    }

    /**
     * Returns handles for debtors with a given EAN
     * @param $ean
     * @return DebtorHandleEntity[]
     */
    public function findDebtorsByEan($ean)
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Debtor_FindByEan(['ean' => $ean])
            ->Debtor_FindByEanResult;

        if (!empty((array) $data)) {
            if (is_array($data->DebtorHandle)) {
                // It's a collection of objects
                foreach ($data->DebtorHandle as $d) {
                    $results[] = new DebtorHandleEntity($d);
                }
            } else {
                // Single object
                $results[] = new DebtorHandleEntity($data->DebtorHandle);
            }
        }

        return $results;
    }

    /**
     * Returns handle for debtors with a given email
     * @param $email
     * @return DebtorHandleEntity|null
     */
    public function findDebtorByEmail($email)
    {
        $result = $this->soapApiService
                       ->getConnection()
                       ->Debtor_FindByEmail(['email' => $email]);

        return null !== $result ? new DebtorHandleEntity($result->Debtor_FindByEmailResult) : null;
    }

    /**
     * Returns handles for debtors with a given name
     * @param $name
     * @return DebtorHandleEntity[]
     */
    public function findDebtorsByName($name)
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Debtor_FindByName(['name' => $name])
            ->Debtor_FindByNameResult;

        if (!empty((array) $data)) {
            if (is_array($data->DebtorHandle)) {
                // It's a collection of objects
                foreach ($data->DebtorHandle as $d) {
                    $results[] = new DebtorHandleEntity($d);
                }
            } else {
                // Single object
                $results[] = new DebtorHandleEntity($data->DebtorHandle);
            }
        }

        return $results;
    }

    /**
     * Returns handle for debtor with a given number
     * @param $number
     * @return DebtorHandleEntity|null
     */
    public function findDebtorByNumber($number)
    {
        $result = $this->soapApiService
                       ->getConnection()
                       ->Debtor_FindByNumber(['number' => $number]);

        return null !== $result ? new DebtorHandleEntity($result->Debtor_FindByNumberResult) : null;
    }

    /**
     * Returns handles for debtors with a given partial name
     * @param $partialName
     * @return DebtorHandleEntity[]
     */
    public function findDebtorsByPartialName($partialName)
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Debtor_FindByPartialName(['partialName' => $partialName])
            ->Debtor_FindByPartialNameResult;

        if (!empty((array) $data)) {
            if (is_array($data->DebtorHandle)) {
                // It's a collection of objects
                foreach ($data->DebtorHandle as $d) {
                    $results[] = new DebtorHandleEntity($d);
                }
            } else {
                // Single object
                $results[] = new DebtorHandleEntity($data->DebtorHandle);
            }
        }

        return $results;
    }

    /**
     * Returns handle for debtors with a given telephone and fax number
     * @param $telephoneAndFaxNumber
     * @return DebtorHandleEntity|null
     */
    public function findDebtorByTelephoneAndFaxNumber($telephoneAndFaxNumber)
    {
        $result = $this->soapApiService
                       ->getConnection()
                       ->Debtor_FindByTelephoneAndFaxNumber(['telephoneAndFaxNumber' => $telephoneAndFaxNumber]);

        return null !== $result ? new DebtorHandleEntity($result->Debtor_FindByTelephoneAndFaxNumberResult) : null;
    }

    /**
     * Return handles for all debtors
     * @return DebtorHandleEntity[]
     */
    public function findAllDebtors()
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Debtor_GetAll()
            ->Debtor_GetAllResult;

        if (!empty((array) $data)) {
            // It's a collection of objects
            foreach ($data->DebtorHandle as $d) {
                $results[] = new DebtorHandleEntity($d);
            }
        }

        return $results;
    }

    /**
     * Gets the "property" of a debtor
     * @param DebtorHandleEntity $debtorHandleEntity
     * @param $property
     * @return DebtorHandleEntity
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

        $data = $this->soapApiService
            ->getConnection()
            ->$method(['debtorHandle' => $debtorHandleEntity]);

        return null !== $data ? new DebtorHandleEntity($data->{'Debtor_Get' . $property . 'Result'}) : null;
    }

    /**
     * Create debtor
     * IMPORTANT: Only VAT_ZONE and IS_ACCESSIBLE are mandatory fields!
     *            All the others are optional (based on SOAP documentation)
     * @param DebtorEntity $debtorEntity
     * @return DebtorHandleEntity|null
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
            DebtorEntity::DEBTOR_IS_ACCESSIBLE => $debtorEntity->getIsAccessible(),
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

        $result = $this->soapApiService
            ->getConnection()
            ->Debtor_CreateFromData(['data' => $data]);

        return null !== $result ? $result->Debtor_CreateFromDataResult : null;
    }

    /**
     * Update debtor
     * @param DebtorEntity $debtorEntity
     * @return DebtorHandleEntity|null
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
            DebtorEntity::DEBTOR_IS_ACCESSIBLE => $debtorEntity->getIsAccessible(),
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

        $result = $this->soapApiService
            ->getConnection()
            ->Debtor_UpdateFromData(['data' => $data]);

        return null !== $result ? $result->Debtor_UpdateFromDataResult : null;
    }

    /**
     * Delete debtor
     * @param DebtorHandleEntity $debtorHandleEntity
     * @return null
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
     * @return DebtorHandleEntity|null
     */
    public function createDebtorContact(DebtorHandleEntity $debtorHandleEntity, $name)
    {

        $result = $this->soapApiService
            ->getConnection()
            ->DebtorContact_Create(['debtorHandle' => $debtorHandleEntity, 'name' => $name]);

        return null !== $result ? $result->DebtorContact_CreateResult : null;
    }

    /**
     * Returns a debtor data object for a given debtor
     * @param DebtorHandleEntity $debtorHandleEntity
     * @return mixed|null
     */
    public function getData(DebtorHandleEntity $debtorHandleEntity)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->Debtor_GetData(['entityHandle' => $debtorHandleEntity]);

        return null !== $result ? new DebtorEntity($result->Debtor_GetDataResult) : null;
    }
}