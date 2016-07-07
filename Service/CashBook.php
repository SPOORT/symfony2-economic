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
     * @return CashBookHandleEntity|null
     */
    public function findCashBookByName($name)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->CashBook_FindByName(['name' => $name]);

        return !empty((array) $result) ? new CashBookHandleEntity($result->CashBook_FindByNameResult) : null;
    }

    /**
     * Returns a handle for the cash book with the given number
     * @param $number
     * @return CashBookHandleEntity|null
     */
    public function findCashBookByNumber($number)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->CashBook_FindByNumber(['number' => $number]);

        return !empty((array) $result) ? new CashBookHandleEntity($result->CashBook_FindByNumberResult) : null;
    }

    /**
     * Return handles for all cash books
     * @return CashBookHandleEntity[]
     */
    public function findAllCashBooks()
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->CashBook_GetAll()
            ->CashBook_GetAllResult;

        if (!empty((array) $data)) {
            // It's a collection of objects
            foreach ($data->CashBookHandle as $d) {
                $results[] = new CashBookHandleEntity($d);
            }
        }

        return $results;
    }

    /**
     * Gets the "property" of a cash_boook
     * @param CashBookHandleEntity $cashBookHandleEntity
     * @param $property
     * @return CashBookHandleEntity|null
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

        $data = $this->soapApiService
            ->getConnection()
            ->$method(['cashBookHandle' => $cashBookHandleEntity]);

        return !empty((array) $data) ? new CashBookHandleEntity($data->{'CashBook_Get' . $property . 'Result'}) : null;
    }

    /**
     * Updates a cash book from a data object
     * @param CashBookEntity $cashBookEntity
     * @return CashBookHandleEntity|null
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

        $result = $this->soapApiService
            ->getConnection()
            ->CashBook_UpdateFromData(['data' => $data]);

        return !empty((array) $result) ? $result->CashBook_UpdateFromDataResult : null;
    }

    /**
     * Get actual data from the cash_book handle
     * @param CashBookHandleEntity $cashBookHandleEntity
     * @return mixed|null
     */
    public function getData(CashBookHandleEntity $cashBookHandleEntity)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->CashBook_GetData(['entityHandle' => $cashBookHandleEntity]);

        return !empty((array) $result) ? new CashBookEntity($result->CashBook_GetDataResult) : null;
    }
}