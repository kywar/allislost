<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Model;

use DateTime;
use Doctrine\Common\Collections\Collection;
use KL\ShopBundle\Entity\ProduitPrix;

/**
 * ProduitModel
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
abstract class ProduitModel
{

    /**
     * Get prices
     *
     * @return Collection 
     */
    abstract public function getPrices();

    public function getPrix(DateTime $date = null)
    {        
        if (null === $date){
            $date = new DateTime();
        }
        if ($this->getPrices()->isEmpty()) {
            return null;
        }

        $last = $this->getPrices()->first();
        foreach ($this->getPrices() as $prix) {
            $prix = new ProduitPrix();
            if ($prix->getValidAt() < $date) {
                $last = $prix;
            }
        }
        
        return $last;
    }

}
