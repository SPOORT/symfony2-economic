<?php

namespace Spoort\Bundle\Symfony2EconomicBundle\Entity\Handle;


class DebtorHandle
{

    /** @var $number integer */
    private $number;

    /**
     * DebtorHandle constructor.
     * Create a new handle from an object with matching properties.
     * @param $source
     */
    public function __construct($source)
    {
        if (is_object($source) && isset($source->Number)) {
            $this->setNumber($source->Number);
        } else {

            throw new \InvalidArgumentException(sprintf('Cannot construct %s from given source object: Does not contain property %s.', get_class(), 'Number'));
        }
    }

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