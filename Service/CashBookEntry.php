<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use Spoort\Bundle\Symfony2EconomicBundle\Service\SoapApi as SoapApiService;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\CashBookEntry as CashBookEntryEntity;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\CashBookEntryHandle as CashBookEntryHandleEntity;

class CashBookEntry
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
     * Creates a new cash book entry
     * @param CashBookEntryEntity $cashBookEntryEntity
     * @return CashBookEntryEntity|null
     */
    public function createCashBookEntry(CashBookEntryEntity $cashBookEntryEntity)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->CashBookEntry_CreateFromData(['data' => $cashBookEntryEntity->asTerseAssociateArray()]);

        return !empty((array) $result) ? $result->CashBookEntry_CreateFromDataResult : null;
    }

    /**
     * Get actual data from the cash_book_entry handle
     * @param CashBookEntryHandleEntity $cashBookEntryHandleEntity
     * @return mixed|null
     */
    public function getData(CashBookEntryHandleEntity $cashBookEntryHandleEntity)
    {

        $result = $this->soapApiService
            ->getConnection()
            ->CashBookEntry_GetData(['entityHandle' => $cashBookEntryHandleEntity]);

        return null !== $result ? new CashBookEntryEntity($result->CashBookEntry_GetDataResult) : null;
    }
}