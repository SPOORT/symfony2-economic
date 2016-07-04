<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;

use Spoort\Bundle\Symfony2EconomicBundle\Entity\EconomicSoapEntity;

class CashBookEntryHandle extends EconomicSoapEntity
{
    /** @var $id1 integer */
    private $Id1;

    /** @var $id2 integer */
    private $Id2;

    /**
     * @return int
     */
    public function getId1()
    {
        return $this->Id1;
    }

    /**
     * @param int $id1
     * @return self
     */
    public function setId1($id1)
    {
        $this->Id1 = $id1;

        return $this;
    }

    /**
     * @return int
     */
    public function getId2()
    {
        return $this->Id2;
    }

    /**
     * @param int $id2
     * @return self
     */
    public function setId2($id2)
    {
        $this->Id2 = $id2;

        return $this;
    }


}