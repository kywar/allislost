<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * CommandeController
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 */
class CommandeController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $commandes = $em->getRepository("KLShopBundle:Commande")
                        ->findBy(array(), array("demandeLe"));
        
        return array("commandes" => $commandes);
        
    }
    
    public function addAction()
    {
        
    }
}
