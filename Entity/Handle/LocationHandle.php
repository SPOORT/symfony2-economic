<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class LocationHandle
{
    /** @var $number integer */
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