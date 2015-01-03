<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\AbstractQuery;

class RoundRepository extends EntityRepository
{

    public function findLastRoundPlayedByLeague(League $league)
    {
        $dql = "SELECT r FROM ecucurellaSporTiuBundle:Round r
                WHERE r.league = :league 
                AND r.roundplayed = true
                ORDER BY r.ordernum DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setMaxResults(1);
        $query->setParameter('league', $league);
        return $query->execute();
    }

    public function findAllRoundsPlayedAfterOneRoundByLeague(Round $round)
    {
        $dql = "SELECT r FROM ecucurellaSporTiuBundle:Round r
                WHERE r.league = :league 
                AND r.roundplayed = true
                AND r.ordernum >= :ordernum
                ORDER BY r.ordernum DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('league', $round->getLeague());
        $query->setParameter('ordernum', $round->getOrdernum());
        return $query->execute();
    }

    public function findRoundsByLeague(League $league)
    {
        $dql = "SELECT r FROM ecucurellaSporTiuBundle:Round r
                WHERE r.league = :league 
                ORDER BY r.ordernum";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('league', $league);
        return $query->execute();
    }

}