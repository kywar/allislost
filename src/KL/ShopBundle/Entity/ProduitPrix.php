<?php

namespace KL\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitPrix
 *
 * @ORM\Table(name="shop_produit_prix")
 * @ORM\Entity
 */
class ProduitPrix
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
     * @var float
     *
     * @ORM\Column(name="value", type="float")
     */
    private $value;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="validAt", type="datetime")
     */
    private $validAt;

    /**
     * @var float
     *
     * @ORM\Column(name="remise", type="float")
     */
    private $remise;

    /**
     * @var string
     *
     * @ORM\Column(name="remiseType", type="string", length=1)
     */
    private $remiseType;

    /**
     * @var Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="prices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="produitId", referencedColumnName="id")
     * })
     */
    private $produit;
    
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
     * Set value
     *
     * @param float $value
     * @return ProduitPrix
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return float 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set validAt
     *
     * @param \DateTime $validAt
     * @return ProduitPrix
     */
    public function setValidAt($validAt)
    {
        $this->validAt = $validAt;
    
        return $this;
    }

    /**
     * Get validAt
     *
     * @return \DateTime 
     */
    public function getValidAt()
    {
        return $this->validAt;
    }

    /**
     * Set remise
     *
     * @param float $remise
     * @return ProduitPrix
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;
    
        return $this;
    }

    /**
     * Get remise
     *
     * @return float 
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set remiseType
     *
     * @param string $remiseType
     * @return ProduitPrix
     */
    public function setRemiseType($remiseType)
    {
        $this->remiseType = $remiseType;
    
        return $this;
    }

    /**
     * Get remiseType
     *
     * @return string 
     */
    public function getRemiseType()
    {
        return $this->remiseType;
    }
    
    public function getProduit()
    {
        return $this->produit;
    }

    public function setProduit(Produit $produit)
    {
        $this->produit = $produit;
    }


}