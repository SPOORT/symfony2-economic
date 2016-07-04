<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Service;

use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Spoort\Bundle\Symfony2EconomicBundle\Service\SoapApi as SoapApiService;
use Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle\AccountHandle as AccountHandleEntity;

class Account
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
     * Returns handles for the accounts with the given name
     * @param $name
     * @return AccountHandleEntity[]
     */
    public function findAccountsByName($name)
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Account_FindByName(['name' => $name])
            ->Account_FindByNameResult;

        if (!empty((array) $data)) {
            if (is_array($data->AccountHandle)) {
                // It's a collection of objects
                foreach ($data->AccountHandle as $d) {
                    $results[] = new AccountHandleEntity($d);
                }
            } else {
                // Single object
                $results[] = new AccountHandleEntity($data->AccountHandle);
            }
        }

        return $results;
    }

    /**
     * Returns handle for debtor with a given number
     * @param $number
     * @return AccountsHandleEntity|null
     */
    public function findAccountByNumber($number)
    {
        $result = $this->soapApiService
                       ->getConnection()
                       ->Account_FindByNumber(['number' => $number]);

        return null !== $result ? new AccountHandleEntity($result->Account_FindByNumberResult) : null;
    }

    /**
     * Return handles for all accounts
     * @return AccountHandleEntity[]
     */
    public function findAllAccounts()
    {
        $results = [];
        $data = $this->soapApiService
            ->getConnection()
            ->Account_GetAll()
            ->Account_GetAllResult;

        if (!empty((array) $data)) {
            // It's a collection of objects
            foreach ($data->AccountHandle as $d) {
                $results[] = new AccountHandleEntity($d);
            }
        }

        return $results;
    }

    /**
     * Returns an account data object for a given account
     * @param AccountHandleEntity $accountHandleEntity
     * @return mixed|null
     */
    public function getData(AccountHandleEntity $accountHandleEntity)
    {
        $result = $this->soapApiService
            ->getConnection()
            ->Account_GetData(['entityHandle' => $accountHandleEntity]);

        return null !== $result ? new AccountEntity($result->Account_GetDataResult) : null;
    }
}