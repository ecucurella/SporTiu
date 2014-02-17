<?php

namespace ecucurella\SporTiuBundle\DataFixtures\ORM;

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
        $clubs = $manager->getRepository('ecucurellaSporTiuBundle:Club')->findAll();
        foreach ($clubs as $club) {
          $manager->remove($club);
        }
        $manager->flush();
    }

}