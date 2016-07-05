<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class CurrencyHandle extends EconomicSoapEntity
{

    /** @var string $Code */
    private $Code;

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->Code;
    }

    /**
     * @param string $code
     * @return self
     */
    public function setCode($code)
    {
        $this->Code = $code;

        return $this;
    }
}