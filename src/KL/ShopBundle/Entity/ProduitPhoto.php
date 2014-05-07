<?php
namespace KL\ShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProduitPhoto
 *
 * @ORM\Table(name="shop_produit_photo")
 * @ORM\Entity
 */
class ProduitPhoto
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
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var Produit
     *
     * @ORM\ManyToOne(targetEntity="Produit", inversedBy="photos")
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
     * Set name
     *
     * @param string $name
     * @return ProduitPhoto
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
     * Set position
     *
     * @param integer $position
     * @return ProduitPhoto
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
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