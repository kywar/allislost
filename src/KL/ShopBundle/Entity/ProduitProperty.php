<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitProperty
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 * 
 * @ORM\Table(name="shop_produit_property")
 * @ORM\Entity
 */
class ProduitProperty
{

    /**
     * @var integer
     *
     * @ORM\Column(name="produitId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="properties")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produitId", referencedColumnName="id")
     * })
     */
    private $produitId;

    /**
     * @var string
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="format", type="string", length=255)
     */
    private $format;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="required", type="boolean")
     */
    private $required;

    /**
     * @var boolean
     * 
     * @ORM\Column(name="public", type="boolean")
     */
    private $public;

    /**
     * @var integer
     * 
     * @ORM\Column(name="ordering", type="integer", nullable=true)
     */
    private $ordering;

    /**
     * @var string
     *
     * @ORM\Column(name="position", type="string", length=255, nullable=true)
     */
    private $position;

    /**
     * @var string
     * 
     * @ORM\Column(name="value", type="string", length=255)
     */
    private $value;

    /**
     * Set produitId
     *
     * @param integer $produitId
     * @return ProduitProperty
     */
    public function setProduitId($produitId)
    {
        $this->produitId = $produitId;

        return $this;
    }

    /**
     * Get produitId
     *
     * @return integer 
     */
    public function getProduitId()
    {
        return $this->produitId;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return ProduitProperty
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }


    /**
     * Set name
     *
     * @param string $name
     * @return ProduitProperty
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
     * Set format
     *
     * @param string $format
     * @return ProduitProperty
     */
    public function setFormat($format)
    {
        $this->format = $format;
    
        return $this;
    }

    /**
     * Get format
     *
     * @return string 
     */
    public function getFormat()
    {
        return $this->format;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return ProduitProperty
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
     * Set required
     *
     * @param boolean $required
     * @return ProduitProperty
     */
    public function setRequired($required)
    {
        $this->required = $required;
    
        return $this;
    }

    /**
     * Get required
     *
     * @return boolean 
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return ProduitProperty
     */
    public function setPublic($public)
    {
        $this->public = $public;
    
        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     * @return ProduitProperty
     */
    public function setOrdering($ordering)
    {
        $this->ordering = $ordering;
    
        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer 
     */
    public function getOrdering()
    {
        return $this->ordering;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return ProduitProperty
     */
    public function setPosition($position)
    {
        $this->position = $position;
    
        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition()
    {
        return $this->position;
    }
}