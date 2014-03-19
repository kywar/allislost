<?php
namespace KL\CmsBundle\Entity;

use Doctrine\ORM\EntityRepository;

class CmsActualiteRepository extends EntityRepository
{
    public function getHome(){
        return $this->createQueryBuilder("cae")
              ->where("cae.isHome = :ishome")
              ->setParameter("ishome", (int) true)
              ->setMaxResults(CmsActualite::NB_ACTU_MAX_HOME)
              ->getQuery()
              ->getResult();
    }
}
