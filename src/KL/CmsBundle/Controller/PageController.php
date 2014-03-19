<?php
namespace KL\CmsBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/")
 */
class PageController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function homeAction()
    {        
        return array();
    }
    
}
