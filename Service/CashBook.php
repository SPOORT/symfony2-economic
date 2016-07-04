<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use Spoort\Bundle\Symfony2EconomicBundle\Service\SoapApi as SoapApiService;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\CashBook as CashBookEntity;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CashBookHandle as CashBookHandleEntity;

class CashBook
{
    /** @var SoapApiService $soapApiService */
    private $soapApiService;

    /**
     * CashBookEntry constructor.
     * @param SoapApi $soapApiService
     */
    public function __construct(SoapApiService $soapApiService)
    {
        $this->soapApiService = $soapApiService;
    }

    /**
     * Returns a handle for the cash book with the given name
     * @param $name
     * @return CashBookHandleEntity
     */
    public function findCashBookByName($name)
    {

        return $this->soapApiService
            ->getConnection()
            ->CashBook_FindByName(['name' => $name]);
    }

    /**
     * Returns a handle for the cash book with the given number
     * @param $number
     * @return CashBookHandleEntity
     */
    public function findCashBookByNumber($number)
    {

        return $this->soapApiService
            ->getConnection()
            ->CashBook_FindByNumber(['number' => $number]);
    }

    /**
     * Return handles for all cash books
     * @return CashBookHandleEntity
     */
    public function findAllCashBooks()
    {

        return $this->soapApiService
            ->getConnection()
            ->CashBook_GetAll();
    }

    /**
     * Gets the "property" of a cash_boook
     * @param CashBookHandleEntity $cashBookHandleEntity
     * @param $property
     * @return CashBookHandleEntity
     * @throws InvalidArgumentException
     */
    public function getCashBookProperty(CashBookHandleEntity $cashBookHandleEntity, $property)
    {
        $propertyList = [
            CashBookEntity::CASH_BOOK_NAME,
            CashBookEntity::CASH_BOOK_NUMBER,
            CashBookEntity::CASH_BOOK_ENTRIES,
        ];

        if (!in_array($property, $propertyList)) {
            throw new InvalidArgumentException('Provided property is not correct!');
        }

        $method = 'CashBook_Get' . $property;

        return $this->soapApiService
            ->getConnection()
            ->$method(['cashBookHandle' => $cashBookHandleEntity]);
    }

    /**
     * Updates a cash book from a data object
     * @param CashBookEntity $cashBookEntity
     * @return CashBookHandleEntity
     */
    public function updateCashBook(CashBookEntity $cashBookEntity)
    {
        $data = [
            // Optional input
            CashBookEntity::CASH_BOOK_HANDLE => $cashBookEntity->getHandle(),
            // Mandatory input
            CashBookEntity::CASH_BOOK_NUMBER => $cashBookEntity->getNumber(),
            // Optional input
            CashBookEntity::CASH_BOOK_NAME => $cashBookEntity->getName(),
        ];

        return $this->soapApiService
            ->getConnection()
            ->CashBook_UpdateFromData(['data' => $data]);
    }

    /**
     * Get actual data from the cash_book handle
     * @param CashBookHandleEntity $cashBookHandleEntity
     * @return mixed
     */
    public function getData(CashBookHandleEntity $cashBookHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->CashBook_GetData(['entityHandle' => $cashBookHandleEntity])
            ->CashBook_GetDataResult;
    }
}