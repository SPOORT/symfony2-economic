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
     * Get actual data from the cash_book_entry handle
     * @param CashBookEntryHandleEntity $cashBookEntryHandleEntity
     * @return mixed
     */
    public function getData(CashBookEntryHandleEntity $cashBookEntryHandleEntity)
    {

        return $this->soapApiService
            ->getConnection()
            ->CashBookEntry_GetData(['entityHandle' => $cashBookEntryHandleEntity])
            ->CashBookEntry_GetDataResult;
    }
}