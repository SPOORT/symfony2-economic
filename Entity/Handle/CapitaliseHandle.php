<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class CapitaliseHandle
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