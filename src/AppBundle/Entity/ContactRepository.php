<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ContactRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ContactRepository extends EntityRepository
{

    public function findForAgency(Agency $agency){

        // Listes tous les contacts de l'utilisateur ainsi que TOUS ceux appartenent à un de ses clients

        $query = $this->createQueryBuilder('c')
            ->select('c')
            ->innerJoin('c.user', 'u')
            ->where('u.agency = :agency')
            ->setParameter('agency',$agency)
            ->getQuery()
            ->getResult();

        return $query;
    }
}
