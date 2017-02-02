<?php

namespace AppBundle\Infra\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;

/**
 * CategorieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieRepository extends EntityRepository
{
    public function getCategories()
    {
        $qb = $this->createQueryBuilder('c')
            ->select("c")
            ->orderBy("c.nom", "ASC")
        ;

        return $qb->getQuery()->getResult();
    }
}
