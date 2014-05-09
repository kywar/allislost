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

    abstract public function getProperties();

    public function __call($name, $arguments)
    {
        if (strpos($name, "get") === 0 || strpos($name, "set") === 0) {
            $fonctionName = substr($name, 3);
            $assessor = substr($name, 0, 3);
            $functionCalled = $assessor . "Value(" . $arguments . ")";
            foreach ($this->getProperties() as $property) {
                if ($fonctionName === $property->getName()) {
                    return $property->$functionCalled;
                }
            }
        }
       return;
    }

    public function getPrix(DateTime $date = null)
    {
        if (null === $date) {
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
