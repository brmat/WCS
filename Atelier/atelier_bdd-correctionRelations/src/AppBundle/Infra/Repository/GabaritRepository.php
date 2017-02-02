<?php

namespace AppBundle\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

/**
 * GabaritRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GabaritRepository extends EntityRepository
{
    public function getModeleByCarburant($carburant)
    {
        $qb = $this->createQueryBuilder('g')
            ->select("c.nom as Categorie, m as Modele")
            ->leftjoin('AppBundle:Modele', 'm', Join::WITH, 'g.modele = m')
            ->join('m.categorie', 'c')

            ->where('g.carburant = :carburant')

            ->orderBy("c.nom", "ASC")

            ->setParameter('carburant', $carburant)
        ;

        return $qb->getQuery()->getResult();
    }
}
