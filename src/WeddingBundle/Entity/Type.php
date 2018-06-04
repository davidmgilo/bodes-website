<?php

namespace WeddingBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
/**
 * Type
*   @Vich\Uploadable
 */
class Type
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $image;
    
    /**
     * @Vich\UploadableField(mapping="type_images",fileNameProperty="image")
     * @var File 
     */
    private $imageFile;

    protected $wedding;
    
    public function __construct(){
        $this->wedding = new ArrayCollection();
    }
    
    public function addWedding(\WeddingBundle\Entity\Wedding $wedding){
        $this->wedding[] = $wedding;
        return $this;
    }
    
    public function getWedding(){
        return $this->wedding;
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
     * Set name
     *
     * @param string $name
     *
     * @return Type
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Type
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
     * Set image
     *
     * @param string $image
     *
     * @return Type
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }
    
    /**
     * 
     * @param File $image
     * @return Type
     */
    public function setImageFile(File $image = null){
        $this->imageFile = $image;
        if($image){
            $this->description = trim($this->description)+" ";
        }
    }
    
    public function getImageFile(){
        return $this->imageFile;
    }
    
    public function __toString(){
        return $this->name;
    }
}

