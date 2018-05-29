<?php

namespace WeddingBundle\Entity;

/**
 * Menu
 */
class Menu
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \WeddingBundle\Entity\Dish
     */
    private $dish;

    /**
     * @var \WeddingBundle\Entity\Wedding
     */
    private $wedding;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dish
     *
     * @param \WeddingBundle\Entity\Dish $dish
     *
     * @return Menu
     */
    public function setDish(\WeddingBundle\Entity\Dish $dish = null)
    {
        $this->dish = $dish;

        return $this;
    }

    /**
     * Get dish
     *
     * @return \WeddingBundle\Entity\Dish
     */
    public function getDish()
    {
        return $this->dish;
    }

    /**
     * Set wedding
     *
     * @param \WeddingBundle\Entity\Wedding $wedding
     *
     * @return Menu
     */
    public function setWedding(\WeddingBundle\Entity\Wedding $wedding = null)
    {
        $this->wedding = $wedding;

        return $this;
    }

    /**
     * Get wedding
     *
     * @return \WeddingBundle\Entity\Wedding
     */
    public function getWedding()
    {
        return $this->wedding;
    }
    
    public function __toString(){
        return $this->dish." ".$this->wedding;
    }
}

