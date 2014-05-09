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
     * @var integer
     *
     * @ORM\Column(name="propertyId", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\ManyToOne(targetEntity="Property")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="propertyId", referencedColumnName="id")
     * })
     */
    private $propertyId;
    /**
     * @var string
     * 
     * @ORM\Column(name="name", type="string", length=255)
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
     * Set propertyId
     *
     * @param integer $propertyId
     * @return ProduitProperty
     */
    public function setPropertyId($propertyId)
    {
        $this->propertyId = $propertyId;
    
        return $this;
    }

    /**
     * Get propertyId
     *
     * @return integer 
     */
    public function getPropertyId()
    {
        return $this->propertyId;
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
}