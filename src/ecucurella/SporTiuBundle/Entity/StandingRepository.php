<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\AbstractQuery;

class StandingRepository extends EntityRepository
{

    public function findStandingsByClassification($classification)
    {
        $dql = "SELECT s FROM ecucurellaSporTiuBundle:Standing s
                WHERE s.classification = :classification 
                ORDER BY s.points DESC, s.goalsdifference DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('classification', $classification);
        return $query->execute();
    }

    public function findStandingByClassificationAndClub($classification, $club)
    {
        $dql = "SELECT s FROM ecucurellaSporTiuBundle:Standing s
                WHERE s.classification = :classification 
                AND s.club = :club ";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('classification', $classification);
        $query->setParameter('club', $club);
        return $query->execute();
    }
}