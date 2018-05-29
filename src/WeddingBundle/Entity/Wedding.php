<?php

namespace WeddingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
/**
 * Wedding
 */
class Wedding
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $numPeople;

    /**
     * @var \DateTime
     */
    private $dataCreacio;

    /**
     * @var integer
     */
    private $price;

    /**
     * @var \WeddingBundle\Entity\Type
     */
    private $type;

    /**
     * @var \WeddingBundle\Entity\User
     */
    private $user;

    private $menu;
    
    public function __construct(){
        $this->menu = new ArrayCollection();
        $this->dataCreacio = new \DateTime();
    }
    
    public function addMenu(\WeddingBundle\Entity\Dish $dish){
        $this->menu[] = $dish;
        return $this;
    }
    
    public function getMenu(){
        return $this->menu;
    }

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
     * Set title
     *
     * @param string $title
     *
     * @return Wedding
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Wedding
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set numPeople
     *
     * @param integer $numPeople
     *
     * @return Wedding
     */
    public function setNumPeople($numPeople)
    {
        $this->numPeople = $numPeople;

        return $this;
    }

    /**
     * Get numPeople
     *
     * @return integer
     */
    public function getNumPeople()
    {
        return $this->numPeople;
    }

    /**
     * Set dataCreacio
     *
     * @param \DateTime $dataCreacio
     *
     * @return Wedding
     */
    public function setDataCreacio($dataCreacio)
    {
        $this->dataCreacio = $dataCreacio;

        return $this;
    }

    /**
     * Get dataCreacio
     *
     * @return \DateTime
     */
    public function getDataCreacio()
    {
        return $this->dataCreacio;
    }

    /**
     * Set price
     *
     * @param integer $price
     *
     * @return Wedding
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set type
     *
     * @param \WeddingBundle\Entity\Type $type
     *
     * @return Wedding
     */
    public function setType(\WeddingBundle\Entity\Type $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \WeddingBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set user
     *
     * @param \WeddingBundle\Entity\User $user
     *
     * @return Wedding
     */
    public function setUser(\WeddingBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WeddingBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
    
    public function __toString(){
        return $this->title;
    }
}

