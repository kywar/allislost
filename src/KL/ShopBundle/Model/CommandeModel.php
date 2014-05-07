<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Model;

/**
 * CommandeModel
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
class CommandeModel
{

    const ETAT_NOUVEAU = "nouveau";
    const ETAT_EN_COURS = "en cours";
    const ETAT_FOURNISSEUR = "commande fournisseur";
    const ETAT_ARRIVAGE = "arrivage prochain";
    const ETAT_DISPONNIBLE = "disponnible";
    const ETAT_LIVRAISON = "livraison";
    const ETAT_LIVREE = "livrée";

    static final public function getEtats()
    {
        $result = array(
            self::ETAT_NOUVEAU,
            self::ETAT_EN_COURS,
            self::ETAT_FOURNISSEUR,
            self::ETAT_ARRIVAGE,
            self::ETAT_DISPONNIBLE,
            self::ETAT_LIVRAISON,
            self::ETAT_LIVREE
        );

        return array_combine($result, $result);
    }

}
