<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use Spoort\Bundle\Symfony2EconomicBundle\Service\SoapApi as SoapApiService;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Creditor as CreditorEntity;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorHandle as CreditorHandleEntity;

class Creditor
{
    /** @var SoapApiService $soapApiService */
    private $soapApiService;

    /**
     * Creditor constructor.
     * @param SoapApi $soapApiService
     */
    public function __construct(SoapApiService $soapApiService)
    {
        $this->soapApiService = $soapApiService;
    }

    /**
     * Returns handle for creditors with a given name
     * @param $name
     * @return CreditorHandleEntity|null
     */
    public function findCreditorByName($name)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->Creditor_FindByName(['name' => $name]);

        return null !== $result ? new CreditorHandleEntity($result->Creditor_FindByEmailResult) : null;
    }

    /**
     * Returns handle for creditor with a given number
     * @param $number
     * @return CreditorHandleEntity
     */
    public function findCreditorByNumber($number)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->Creditor_FindByNumber(['number' => $number]);

        return null !== $result ? new CreditorHandleEntity($result->Creditor_FindByNumberResult) : null;
    }

    /**
     * Return handles for all creditors
     * @return CreditorHandleEntity[]
     */
    public function findAllCreditors()
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Creditor_GetAll()
            ->Creditor_GetAllResult;

        if (!empty((array) $data)) {
            // It's a collection of objects
            foreach ($data->CreditorHandle as $d) {
                $results[] = new CreditorHandleEntity($d);
            }
        }

        return $results;
    }

    /**
     * Gets the "property" of a creditor
     * @param CreditorHandleEntity $creditorHandleEntity
     * @param $property
     * @return CreditorHandleEntity
     * @throws InvalidArgumentException
     */
    public function getCreditorProperty(CreditorHandleEntity $creditorHandleEntity, $property)
    {
        $propertyList = [
            CreditorEntity::CREDITOR_ADDRESS,
            CreditorEntity::CREDITOR_BANK_ACCOUNT,
            CreditorEntity::CREDITOR_CI_NUMBER,
            CreditorEntity::CREDITOR_CITY,
            CreditorEntity::CREDITOR_COUNTRY,
            CreditorEntity::CREDITOR_COUNTY,
            CreditorEntity::CREDITOR_EMAIL,
            CreditorEntity::CREDITOR_NAME,
        ];

        if (!in_array($property, $propertyList)) {
            throw new InvalidArgumentException('Provided property is not correct!');
        }

        $method = 'Creditor_Get' . $property;

        $data = $this->soapApiService
            ->getConnection()
            ->$method(['creditorHandle' => $creditorHandleEntity]);

        return null !== $data ? new CreditorHandleEntity($data->{'Creditor_Get' . $property . 'Result'}) : null;
    }

    /**
     * Creates a new creditor from a data object
     * @param CreditorEntity $creditorEntity
     * @return CreditorHandleEntity|null
     */
    public function createCreditor(CreditorEntity $creditorEntity)
    {
        $data = [
            // Optional inputs
            CreditorEntity::CREDITOR_HANDLE => $creditorEntity->getHandle(),
            CreditorEntity::CREDITOR_NUMBER => $creditorEntity->getNumber(),
            CreditorEntity::CREDITOR_CREDITOR_GROUP_HANDLE => $creditorEntity->getCreditorGroupHandle(),
            CreditorEntity::CREDITOR_NAME => $creditorEntity->getName(),
            // Mandatory input
            CreditorEntity::CREDITOR_VAT_ZONE => $creditorEntity->getVatZone(),
            // Optional inputs
            CreditorEntity::CREDITOR_CURRENCY_HANDLE => $creditorEntity->getCurrencyHandle(),
            CreditorEntity::CREDITOR_TERM_OF_PAYMENT_HANDLE => $creditorEntity->getTermOfPaymentHandle(),
            // Mandatory input
            CreditorEntity::CREDITOR_IS_ACCESSIBLE => $creditorEntity->getIsAccessible(),
            // Optional inputs
            CreditorEntity::CREDITOR_CI_NUMBER => $creditorEntity->getCiNumber(),
            CreditorEntity::CREDITOR_EMAIL => $creditorEntity->getEmail(),
            CreditorEntity::CREDITOR_ADDRESS => $creditorEntity->getAddress(),
            CreditorEntity::CREDITOR_POSTAL_CODE => $creditorEntity->getPostalCode(),
            CreditorEntity::CREDITOR_CITY => $creditorEntity->getCity(),
            CreditorEntity::CREDITOR_COUNTRY => $creditorEntity->getCountry(),
            CreditorEntity::CREDITOR_BANK_ACCOUNT => $creditorEntity->getBankAccount(),
            CreditorEntity::CREDITOR_ATTENTION_HANDLE => $creditorEntity->getAttentionHandle(),
            CreditorEntity::CREDITOR_YOUR_REFERENCE_HANDLE => $creditorEntity->getYourReferenceHandle(),
            CreditorEntity::CREDITOR_OUR_REFERENCE_HANDLE => $creditorEntity->getOurReferenceHandle(),
            CreditorEntity::CREDITOR_DEFAULT_PAYMENT_TYPE_HANDLE => $creditorEntity->getDefaultPaymentTypeHandle(),
            CreditorEntity::CREDITOR_DEFAULT_PAYMENT_CREDITOR_ID_HANDLE => $creditorEntity->getDefaultPaymentCreditorId(),
            CreditorEntity::CREDITOR_COUNTY => $creditorEntity->getCounty(),
            CreditorEntity::CREDITOR_AUTO_CONTRA_ACCOUNT_HANDLE => $creditorEntity->getAutoContraAccountHandle(),
            CreditorEntity::CREDITOR_DEFAULT_INVOICE_TEXT => $creditorEntity->getDefaultInvoiceText(),
        ];

        $result = $this->soapApiService
            ->getConnection()
            ->Creditor_CreateFromData(['data' => $data]);

        return null !== $result ? $result->Creditor_CreateFromDataResult : null;
    }

    /**
     * Updates a creditor from a data object
     * @param CreditorEntity $creditorEntity
     * @return CreditorHandleEntity|null
     */
    public function updateCreditor(CreditorEntity $creditorEntity)
    {
        $data = [
            // Optional inputs
            CreditorEntity::CREDITOR_HANDLE => $creditorEntity->getHandle(),
            CreditorEntity::CREDITOR_NUMBER => $creditorEntity->getNumber(),
            CreditorEntity::CREDITOR_CREDITOR_GROUP_HANDLE => $creditorEntity->getCreditorGroupHandle(),
            CreditorEntity::CREDITOR_NAME => $creditorEntity->getName(),
            // Mandatory input
            CreditorEntity::CREDITOR_VAT_ZONE => $creditorEntity->getVatZone(),
            // Optional inputs
            CreditorEntity::CREDITOR_CURRENCY_HANDLE => $creditorEntity->getCurrencyHandle(),
            CreditorEntity::CREDITOR_TERM_OF_PAYMENT_HANDLE => $creditorEntity->getTermOfPaymentHandle(),
            // Mandatory input
            CreditorEntity::CREDITOR_IS_ACCESSIBLE => $creditorEntity->getIsAccessible(),
            // Optional inputs
            CreditorEntity::CREDITOR_CI_NUMBER => $creditorEntity->getCiNumber(),
            CreditorEntity::CREDITOR_EMAIL => $creditorEntity->getEmail(),
            CreditorEntity::CREDITOR_ADDRESS => $creditorEntity->getAddress(),
            CreditorEntity::CREDITOR_POSTAL_CODE => $creditorEntity->getPostalCode(),
            CreditorEntity::CREDITOR_CITY => $creditorEntity->getCity(),
            CreditorEntity::CREDITOR_COUNTRY => $creditorEntity->getCountry(),
            CreditorEntity::CREDITOR_BANK_ACCOUNT => $creditorEntity->getBankAccount(),
            CreditorEntity::CREDITOR_ATTENTION_HANDLE => $creditorEntity->getAttentionHandle(),
            CreditorEntity::CREDITOR_YOUR_REFERENCE_HANDLE => $creditorEntity->getYourReferenceHandle(),
            CreditorEntity::CREDITOR_OUR_REFERENCE_HANDLE => $creditorEntity->getOurReferenceHandle(),
            CreditorEntity::CREDITOR_DEFAULT_PAYMENT_TYPE_HANDLE => $creditorEntity->getDefaultPaymentTypeHandle(),
            CreditorEntity::CREDITOR_DEFAULT_PAYMENT_CREDITOR_ID_HANDLE => $creditorEntity->getDefaultPaymentCreditorId(),
            CreditorEntity::CREDITOR_COUNTY => $creditorEntity->getCounty(),
            CreditorEntity::CREDITOR_AUTO_CONTRA_ACCOUNT_HANDLE => $creditorEntity->getAutoContraAccountHandle(),
            CreditorEntity::CREDITOR_DEFAULT_INVOICE_TEXT => $creditorEntity->getDefaultInvoiceText(),
        ];

        $result = $this->soapApiService
            ->getConnection()
            ->Creditor_UpdateFromData(['data' => $data]);

        return null !== $result ? $result->Creditor_CreateFromDataResult : null;
    }

    /**
     * Deletes a creditor
     * @param CreditorHandleEntity $creditorHandleEntity
     * @return null
     */
    public function deleteCreditor(CreditorHandleEntity $creditorHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->Creditor_Delete(['creditorHandle' => $creditorHandleEntity]);
    }

    /**
     * Creates a new creditor contact
     * @param CreditorHandleEntity $creditorHandleEntity
     * @param $name
     * @return CreditorHandleEntity|null
     */
    public function createCreditorContact(CreditorHandleEntity $creditorHandleEntity, $name)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->CreditorContact_Create(['creditorHandle' => $creditorHandleEntity, 'name' => $name]);

        return null !== $result ? $result->CreditorContact_CreateResult : null;
    }

    /**
     * Get actual data from the creditor handle
     * @param CreditorHandleEntity $creditorHandleEntity
     * @return mixed|null
     */
    public function getData(CreditorHandleEntity $creditorHandleEntity)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->Creditor_GetData(['entityHandle' => $creditorHandleEntity]);

        return null !== $result ? new CreditorEntity($result->Creditor_GetDataResult) : null;
    }
}