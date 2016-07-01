<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use Spoort\Bundle\Symfony2EconomicBundle\Service\SoapApi as SoapApiService;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Creditor as CreditorEntity;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CreditorHandle as CreditorHandleEntity;

class Creditor
{
    /** @var $soapApiService SoapApiService */
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
     * @return mixed
     */
    public function findCreditorByName($name)
    {

        return $this->soapApiService
            ->getConnection()
            ->Creditor_FindByName(['name' => $name])
            ->Creditor_FindByNameResult;
    }

    /**
     * Returns handle for creditor with a given number
     * @param $number
     * @return mixed
     */
    public function findCreditorByNumber($number)
    {

        return $this->soapApiService
            ->getConnection()
            ->Creditor_FindByNumber(['number' => $number])
            ->Creditor_FindByNumberResult;
    }

    /**
     * Return handles for all creditors
     * @return mixed
     */
    public function findAllCreditors()
    {

        return $this->soapApiService
            ->getConnection()
            ->Creditor_GetAll()
            ->Creditor_GetAllResult;
    }

    /**
     * Gets the "property" of a creditor
     * @param CreditorHandleEntity $creditorHandleEntity
     * @param $property
     * @return mixed
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
        $result = 'Creditor_Get' . $property . 'Result';

        return $this->soapApiService
            ->getConnection()
            ->$method(['creditorHandle' => $creditorHandleEntity])
            ->$result;
    }

    /**
     * Creates a new creditor from a data object
     * @param CreditorEntity $creditorEntity
     * @return mixed
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
            CreditorEntity::CREDITOR_IS_ACCESSIBLE => $creditorEntity->isIsAccessible(),
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

        return $this->soapApiService
            ->getConnection()
            ->Creditor_CreateFromData(['data' => $data])
            ->Creditor_CreateFromDataResult;
    }

    /**
     * Updates a creditor from a data object
     * @param CreditorEntity $creditorEntity
     * @return mixed
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
            CreditorEntity::CREDITOR_IS_ACCESSIBLE => $creditorEntity->isIsAccessible(),
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

        return $this->soapApiService
            ->getConnection()
            ->Creditor_UpdateFromData(['data' => $data])
            ->Creditor_UpdateFromDataResult;
    }

    /**
     * Deletes a creditor
     * @param CreditorHandleEntity $creditorHandleEntity
     * @return mixed
     */
    public function deleteCreditor(CreditorHandleEntity $creditorHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->Creditor_Delete(['creditorHandle' => $creditorHandleEntity])
            ->Creditor_DeleteResult;
    }

    /**
     * Creates a new creditor contact
     * @param CreditorHandleEntity $creditorHandleEntity
     * @param $name
     * @return mixed
     */
    public function createCreditorContact(CreditorHandleEntity $creditorHandleEntity, $name)
    {

        return $this->soapApiService
            ->getConnection()
            ->CreditorContact_Create(['creditorHandle' => $creditorHandleEntity, 'name' => $name])
            ->CreditorContact_CreateResult;
    }
}