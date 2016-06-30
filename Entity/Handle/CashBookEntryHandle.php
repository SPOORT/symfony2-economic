<?php
/**
 * This file is part of SPOORT International ApS
 * and belongs to SPOORT International ApS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class CashBookEntryHandle
{
    /** @var $id1 integer */
    private $id1;

    /** @var $id2 integer */
    private $id2;

    /**
     * @return int
     */
    public function getId1()
    {
        return $this->id1;
    }

    /**
     * @param int $id1
     * @return self
     */
    public function setId1($id1)
    {
        $this->id1 = $id1;

        return $this;
    }

    /**
     * @return int
     */
    public function getId2()
    {
        return $this->id2;
    }

    /**
     * @param int $id2
     * @return self
     */
    public function setId2($id2)
    {
        $this->id2 = $id2;

        return $this;
    }


}