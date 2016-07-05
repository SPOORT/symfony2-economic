<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class AttentionHandle extends EconomicSoapEntity
{
    /** @var integer $Id */
    private $Id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * @param int $id
     * @return self
     */
    public function setId($id)
    {
        $this->Id = $id;

        return $this;
    }
}