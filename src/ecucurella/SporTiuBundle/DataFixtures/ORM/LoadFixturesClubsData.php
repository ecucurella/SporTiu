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
            array('UE Castellnou','CASTELLNOU','2010',
              'http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',
              'Samarreta verda, pantalons negres','Samarreta groga, pantalons blaus',
              'veteranscastellnou@gmail.com', 'http://veteranscastellnou.wordpress.com'),
            array('CVF Monistrol','MONISTROL','1996',
              'http://veteranscastellnou.files.wordpress.com/2013/09/monistrol.png',
              'Samarreta i pantalons vermells','','Byoff@msn.com',
              'http://cvfmonistrol.hol.es/index.php'),
            array('CF Callús','CALLÚS','1921',
              'http://veteranscastellnou.files.wordpress.com/2013/09/callus.jpeg',
              'Samarreta barres vermelles i grogues, pantalons vermells','','clubfutbolcallus@gmail.com',
              'http://www.cfcallus.com')
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