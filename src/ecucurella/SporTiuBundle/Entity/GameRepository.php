<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\ORM\AbstractQuery;

class GameRepository extends EntityRepository
{
    public function findNextGames()
    {
        $dql = "SELECT g FROM ecucurellaSporTiuBundle:Game g
				WHERE g.gamestate = 'CALENDAR' 
				OR g.gamestate = 'SCHEDULED'
				ORDER BY g.gamedate";

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->execute();
    }
    
    public function findLastGames()
    {
        $dql = "SELECT g FROM ecucurellaSporTiuBundle:Game g
				WHERE g.gamestate = 'PLAYED' 
				OR g.gamestate = 'SUSPENDED'
				ORDER BY g.gamedate DESC";

        $query = $this->getEntityManager()->createQuery($dql);

        return $query->execute();
    }

    public function findNextGamesbyClub($club)
    {
        $dql = "SELECT g FROM ecucurellaSporTiuBundle:Game g
                WHERE (g.gamestate = 'CALENDAR' OR g.gamestate = 'SCHEDULED')
                AND ( g.localclub = :club OR g.visitorclub = :club)
                ORDER BY g.gamedate";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('club', $club);
        return $query->execute();
    }
    
    public function findLastGamesbyClub($club)
    {
        $dql = "SELECT g FROM ecucurellaSporTiuBundle:Game g
                WHERE (g.gamestate = 'PLAYED' OR g.gamestate = 'SUSPENDED')
                AND ( g.localclub = :club OR g.visitorclub = :club)
                ORDER BY g.gamedate DESC";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('club', $club);
        return $query->execute();
    }

    public function updateGamesStandingCountByRound($round)
    {
        $dql = "UPDATE ecucurellaSporTiuBundle:Game g
                SET g.standingcount = false
                WHERE g.round = :round";

        $query = $this->getEntityManager()->createQuery($dql);
        $query->setParameter('round', $round);
        return $query->execute();
    }

}