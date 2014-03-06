<?php

namespace ecucurella\SporTiuBundle\Tests\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ecucurella\SporTiuBundle\Entity\Club;

class LoadFixturesClubsData extends AbstractFixture implements FixtureInterface
{

    public function load(ObjectManager $manager)
    {
        $this->createClubs($manager);
        $manager->flush();
    }

    public function loadGames(ObjectManager $manager)
    {
        $this->createGames($manager);
        $manager->flush();
    }

    private function createClubs(ObjectManager $manager)
    {
        $clubs = array(
            array('UE Castellnou1','CASTELLNOU1',null, null,null,null,null,null),
            array('UE Castellnou2','CASTELLNOU2','2010', null,null,null,null,null),
            array('UE Castellnou3','CASTELLNOU3','2010','http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',null,null,null,null),
            array('UE Castellnou4','CASTELLNOU4','2010','http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',
              'Samarreta verda, pantalons negres',null,null,null),
            array('UE Castellnou5','CASTELLNOU5','2010','http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',
              'Samarreta verda, pantalons negres','Samarreta groga, pantalons blaus',null, null),
            array('UE Castellnou6','CASTELLNOU6','2010','http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',
              'Samarreta verda, pantalons negres','Samarreta groga, pantalons blaus',
              'veteranscastellnou@gmail.com', null),
            array('UE Castellnou7','CASTELLNOU7','2010','http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',
              'Samarreta verda, pantalons negres','Samarreta groga, pantalons blaus',
              'veteranscastellnou@gmail.com', 'http://veteranscastellnou.wordpress.com'),
        );

        foreach ($clubs as $club_fixture) {
            $club = new Club();
            $club->setName($club_fixture[0]);
            $club->setAbbreviation($club_fixture[1]);
            $club->setCreationYear($club_fixture[2]);
            $club->setLogo($club_fixture[3]);
            $club->setColors($club_fixture[4]);
            $club->setAlternativeColors($club_fixture[5]);
            $club->setEmail($club_fixture[6]);
            $club->setWebsite($club_fixture[7]);
            $manager->persist($club);
        }
    }

    public function unload(ObjectManager $manager)
    {
        $games = $manager->getRepository('ecucurellaSporTiuBundle:Game')->findAll();
        foreach ($games as $game) {
          $manager->remove($game);
        }
        $clubs = $manager->getRepository('ecucurellaSporTiuBundle:Club')->findAll();
        foreach ($clubs as $club) {
          $manager->remove($club);
        }
        $manager->flush();
    }

    public function createGames(ObjectManager $manager)
    {
        
        $castellnou1 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou1'));
        $castellnou2 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou2'));
        $castellnou3 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou3'));
        $castellnou4 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou4'));
        $castellnou5 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou5'));
        $castellnou6 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou6'));
        $castellnou7 = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'UE Castellnou7'));


        $games = array(
            array(
              5,
              0,
              '09-11-2014 17:14:00',
              $castellnou1,
              $castellnou2,
              'PLAYED'
              ),
            array(
              0,
              4,
              '09-11-2014 17:14:00',
              $castellnou3,
              $castellnou4,
              'PLAYED'
              ),
            array(
              3,
              3,
              '09-11-2014 17:14:00',
              $castellnou5,
              $castellnou6,
              'PLAYED'
              ),
            array(
              0,
              0,
              '11-09-2014 00:00:00',
              $castellnou7,
              $castellnou1,
              'CALENDAR'
              )
        );

        foreach ($games as $game_fixture) {
            $game = new Game();
            $game->setLocalpoints($game_fixture[0]);
            $game->setVisitorpoints($game_fixture[1]);
            $game->setGamedate(date_create_from_format('d-m-Y H:i:s',$game_fixture[2]));
            $game = $game->setLocalclub($game_fixture[3]);
            $game = $game->setVisitorclub($game_fixture[4]);
            $game->setGamestate($game_fixture[5]);
            $manager->persist($game);
        }
        
    }

}