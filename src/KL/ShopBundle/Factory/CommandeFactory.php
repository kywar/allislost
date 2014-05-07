<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Factory;

use KL\ShopBundle\Entity\Commande;
/**
 * CommandeFactory
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
class CommandeFactory
{
    public function build()
    {
        $commande = new Commande();
        $commande->setDemandeLe(new \DateTime());
        $commande->setPasseLe(new \DateTime());
        
    }
}
