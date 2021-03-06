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

        return !empty((array) $result) ? new DebtorHandleEntity($result->Debtor_FindByEmailResult) : null;
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

        return !empty((array) $result) ? new DebtorHandleEntity($result->Debtor_FindByNumberResult) : null;
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

        return !empty((array) $result) ? new DebtorHandleEntity($result->Debtor_FindByTelephoneAndFaxNumberResult) : null;
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

        return !empty((array) $data) ? new DebtorHandleEntity($data->{'Debtor_Get' . $property . 'Result'}) : null;
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
        $result = $this->soapApiService
            ->getConnection()
            ->Debtor_CreateFromData(['data' => $debtorEntity->asTerseAssociateArray()]);

        return !empty((array) $result) ? $result->Debtor_CreateFromDataResult : null;
    }

    /**
     * Update debtor
     * @param DebtorEntity $debtorEntity
     * @return DebtorHandleEntity|null
     */
    public function updateDebtor(DebtorEntity $debtorEntity)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->Debtor_UpdateFromData(['data' => $debtorEntity->asTerseAssociateArray()]);

        return !empty((array) $result) ? $result->Debtor_UpdateFromDataResult : null;
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

        return !empty((array) $result) ? $result->DebtorContact_CreateResult : null;
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

        return !empty((array) $result) ? new DebtorEntity($result->Debtor_GetDataResult) : null;
    }
}