<?php
/**
 * @package 
 */
namespace KL\ShopBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * ProduitController
 * @author Pierre MICHEL <pierre@adstrategy.fr>
 * @Route("/produit")
 */
class ProduitController extends Controller
{
    /**
     * @Route("/")
     * @Method("GET")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $results = $em->getRepository("KLShopBundle:Produit")->findBy(array(), array("name"));
        
        return array("results" => $results);        
    }
}
