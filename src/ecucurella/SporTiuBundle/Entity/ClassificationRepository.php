<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\AbstractQuery;

class ClassificationRepository extends EntityRepository
{

    public function deleteClassificationByRound($round)
    {
        $dql = "DELETE FROM ecucurellaSporTiuBundle:Classification c
                WHERE c.round = :round ";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('round', $round);
        //Returns number of rows deleted
        return $query->execute();
    }

}