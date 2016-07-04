<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class CostTypeHandle extends EconomicSoapEntity
{

    /** @var $number string */
    private $number;

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     * @return self
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }
}