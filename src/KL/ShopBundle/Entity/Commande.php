<?php

namespace KL\ShopBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="shop_commande")
 * @ORM\Entity
 */
class Commande
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
     * @var DateTime
     *
     * @ORM\Column(name="demandeLe", type="datetime")
     */
    private $demandeLe;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="passeLe", type="datetime")
     */
    private $passeLe;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="recueLe", type="datetime")
     */
    private $recueLe;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="livreLe", type="datetime")
     */
    private $livreLe;

    /**
     * @var string
     *
     * @ORM\Column(name="etat", type="string", length=255)
     */
    private $etat;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="adresseLivraison", type="string", length=255)
     */
    private $adresseLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="cpLivraison", type="string", length=255)
     */
    private $cpLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="identiteLivraison", type="string", length=255)
     */
    private $identiteLivraison;

    /**
     * @var string
     *
     * @ORM\Column(name="villeLivraison", type="string", length=255)
     */
    private $villeLivraison;

    /**
     * @var float
     *
     * @ORM\Column(name="totalCommande", type="float")
     */
    private $totalCommande;

    /*
    * @ORM\OneToMany(targetEntity="CommandeProduit", mappedBy="commande")
     *
    private $commandeProduit;*/

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
     * Set demandeLe
     *
     * @param DateTime $demandeLe
     * @return Commande
     */
    public function setDemandeLe($demandeLe)
    {
        $this->demandeLe = $demandeLe;
    
        return $this;
    }

    /**
     * Get demandeLe
     *
     * @return DateTime 
     */
    public function getDemandeLe()
    {
        return $this->demandeLe;
    }

    /**
     * Set passeLe
     *
     * @param DateTime $passeLe
     * @return Commande
     */
    public function setPasseLe($passeLe)
    {
        $this->passeLe = $passeLe;
    
        return $this;
    }

    /**
     * Get passeLe
     *
     * @return DateTime 
     */
    public function getPasseLe()
    {
        return $this->passeLe;
    }

    /**
     * Set recueLe
     *
     * @param DateTime $recueLe
     * @return Commande
     */
    public function setRecueLe($recueLe)
    {
        $this->recueLe = $recueLe;
    
        return $this;
    }

    /**
     * Get recueLe
     *
     * @return DateTime 
     */
    public function getRecueLe()
    {
        return $this->recueLe;
    }

    /**
     * Set livreLe
     *
     * @param DateTime $livreLe
     * @return Commande
     */
    public function setLivreLe($livreLe)
    {
        $this->livreLe = $livreLe;
    
        return $this;
    }

    /**
     * Get livreLe
     *
     * @return DateTime 
     */
    public function getLivreLe()
    {
        return $this->livreLe;
    }

    /**
     * Set etatC
     *
     * @param string $etatC
     * @return Commande
     */
    public function setEtatC($etatC)
    {
        $this->etatC = $etatC;
    
        return $this;
    }

    /**
     * Get etatC
     *
     * @return string 
     */
    public function getEtatC()
    {
        return $this->etatC;
    }

    /**
     * Set etat
     *
     * @param string $etat
     * @return Commande
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    
        return $this;
    }

    /**
     * Get etat
     *
     * @return string 
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set reference
     *
     * @param string $reference
     * @return Commande
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
     * Set adresseLivraison
     *
     * @param string $adresseLivraison
     * @return Commande
     */
    public function setAdresseLivraison($adresseLivraison)
    {
        $this->adresseLivraison = $adresseLivraison;
    
        return $this;
    }

    /**
     * Get adresseLivraison
     *
     * @return string 
     */
    public function getAdresseLivraison()
    {
        return $this->adresseLivraison;
    }

    /**
     * Set cpLivraison
     *
     * @param string $cpLivraison
     * @return Commande
     */
    public function setCpLivraison($cpLivraison)
    {
        $this->cpLivraison = $cpLivraison;
    
        return $this;
    }

    /**
     * Get cpLivraison
     *
     * @return string 
     */
    public function getCpLivraison()
    {
        return $this->cpLivraison;
    }

    /**
     * Set identiteLivraison
     *
     * @param string $identiteLivraison
     * @return Commande
     */
    public function setIdentiteLivraison($identiteLivraison)
    {
        $this->identiteLivraison = $identiteLivraison;
    
        return $this;
    }

    /**
     * Get identiteLivraison
     *
     * @return string 
     */
    public function getIdentiteLivraison()
    {
        return $this->identiteLivraison;
    }

    /**
     * Set villeLivraison
     *
     * @param string $villeLivraison
     * @return Commande
     */
    public function setVilleLivraison($villeLivraison)
    {
        $this->villeLivraison = $villeLivraison;
    
        return $this;
    }

    /**
     * Get villeLivraison
     *
     * @return string 
     */
    public function getVilleLivraison()
    {
        return $this->villeLivraison;
    }

    /**
     * Set totalCommande
     *
     * @param float $totalCommande
     * @return Commande
     */
    public function setTotalCommande($totalCommande)
    {
        $this->totalCommande = $totalCommande;
    
        return $this;
    }

    /**
     * Get totalCommande
     *
     * @return float 
     */
    public function getTotalCommande()
    {
        return $this->totalCommande;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->commandeProduit = new ArrayCollection();
    }
    
    /**
     * Add commandeProduit
     *
     * @param CommandeProduit $commandeProduit
     * @return Commande
     */
    public function addCommandeProduit(CommandeProduit $commandeProduit)
    {
        $this->commandeProduit[] = $commandeProduit;
    
        return $this;
    }

    /**
     * Remove commandeProduit
     *
     * @param CommandeProduit $commandeProduit
     */
    public function removeCommandeProduit(CommandeProduit $commandeProduit)
    {
        $this->commandeProduit->removeElement($commandeProduit);
    }

    /**
     * Get commandeProduit
     *
     * @return Collection 
     */
    public function getCommandeProduit()
    {
        return $this->commandeProduit;
    }
}