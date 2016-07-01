<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class CurrencyHandle
{

    /** @var $code string */
    private $code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }
}