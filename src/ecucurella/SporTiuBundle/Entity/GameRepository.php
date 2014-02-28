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

}