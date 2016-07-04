<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class CostTypeHandle extends EconomicSoapEntity
{

    /** @var $number string */
    private $Number;

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->Number;
    }

    /**
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->Number = $number;

        return $this;
    }
}