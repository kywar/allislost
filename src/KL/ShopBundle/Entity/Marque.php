<?php
namespace KL\ShopBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use KL\ShopBundle\Model\MarqueModel;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Marque
 *
 * @ORM\Table(name="shop_marque")
 * 
 * @ORM\Entity
 */
class Marque extends MarqueModel
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
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     * @Assert\File(maxSize="6000000")
     */
    private $logo;

    /**
     * @ORM\OneToMany(targetEntity="Produit", mappedBy="marque")
     */
    private $produits;

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
     * @return Marque
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
     * Set website
     *
     * @param string $website
     * @return Marque
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Marque
     */
    public function setLogo(UploadedFile $logo = null)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return UploadedFile
     */
    public function getLogo()
    {
        return $this->logo;
    }

    public function getPath()
    {
        return $this->getLogo();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }
    
    /**
     * Add produits
     *
     * @param Produit $produits
     * @return Marque
     */
    public function addProduit(Produit $produits)
    {
        $this->produits[] = $produits;
    
        return $this;
    }

    /**
     * Remove produits
     *
     * @param Produit $produits
     */
    public function removeProduit(Produit $produits)
    {
        $this->produits->removeElement($produits);
    }

    /**
     * Get produits
     *
     * @return Collection 
     */
    public function getProduits()
    {
        return $this->produits;
    }
    
    public function __toString()
    {
        return $this->getName();
    }
}