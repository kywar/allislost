<?php
namespace KL\ShopBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use KL\ShopBundle\Model\ProduitModel;

/**
 * Produit
 *
 * @ORM\Table(name="shop_produit")
 * @ORM\Entity
 */
class Produit extends ProduitModel
{

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="addedAt", type="datetime")
     */
    private $addedAt;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="active", type="boolean")
     */
    private $active;

    /**
     * @ORM\ManyToOne(targetEntity="Marque", inversedBy="produits")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="marqueId", referencedColumnName="id")
     * })
     */
    private $marque;

    /**
     * @ORM\OneToMany(targetEntity="ProduitPhoto", mappedBy="produit")
     */
    private $photos;

    /**
     * @ORM\OneToMany(targetEntity="ProduitPrix", mappedBy="produit")
     */
    private $prices;
    
    /**
     * @ORM\OneToMany(targetEntity="ProduitProperty", mappedBy="produit")
     */
    private $properties;
    
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
     * @return Produit
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
     * @return Produit
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
     * Set reference
     *
     * @param string $reference
     * @return Produit
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string 
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set addedAt
     *
     * @param DateTime $addedAt
     * @return Produit
     */
    public function setAddedAt($addedAt)
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * Get addedAt
     *
     * @return DateTime 
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }

    /**
     * Add photos
     *
     * @param ProduitPhoto $photos
     * @return Produit
     */
    public function addPhoto(ProduitPhoto $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param ProduitPhoto $photos
     */
    public function removePhoto(ProduitPhoto $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add prices
     *
     * @param ProduitPrix $prices
     * @return Produit
     */
    public function addPrice(ProduitPrix $prices)
    {
        $this->prices[] = $prices;

        return $this;
    }

    /**
     * Remove prices
     *
     * @param ProduitPrix $prices
     */
    public function removePrice(ProduitPrix $prices)
    {
        $this->prices->removeElement($prices);
    }

    /**
     * Get prices
     *
     * @return Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->photos = new ArrayCollection();
        $this->prices = new ArrayCollection();
        $this->addedAt = new \DateTime();
    }

    /**
     * Set marque
     *
     * @param Marque $marque
     * @return Produit
     */
    public function setMarque(Marque $marque = null)
    {
        $this->marque = $marque;

        return $this;
    }

    /**
     * Get marque
     *
     * @return Marque 
     */
    public function getMarque()
    {
        return $this->marque;
    }

    public function getActive()
    {
        return $this->active;
    }

    public function setActive($active)
    {
        $this->active = $active;
        
         return $this;
    }



    /**
     * Add properties
     *
     * @param \KL\ShopBundle\Entity\ProduitProperty $properties
     * @return Produit
     */
    public function addPropertie(\KL\ShopBundle\Entity\ProduitProperty $properties)
    {
        $this->properties[] = $properties;
    
        return $this;
    }

    /**
     * Remove properties
     *
     * @param \KL\ShopBundle\Entity\ProduitProperty $properties
     */
    public function removePropertie(\KL\ShopBundle\Entity\ProduitProperty $properties)
    {
        $this->properties->removeElement($properties);
    }

    /**
     * Get properties
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProperties()
    {
        return $this->properties;
    }
}