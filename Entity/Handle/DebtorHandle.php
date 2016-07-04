<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class DebtorHandle extends EconomicSoapEntity
{

    /** @var $number integer */
    private $number;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}