<?php
/**
 * This file is part of SPOORT International ApS
 * and belongs to SPOORT International ApS.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class YourReferenceHandle
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
     * @return TermOfPaymentHandle
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}