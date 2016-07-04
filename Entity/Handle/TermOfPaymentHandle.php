<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class TermOfPaymentHandle extends EconomicSoapEntity
{
    /** @var $id integer */
    private $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}