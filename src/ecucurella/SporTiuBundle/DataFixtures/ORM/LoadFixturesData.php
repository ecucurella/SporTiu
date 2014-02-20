<?php

namespace ecucurella\SporTiuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ecucurella\SporTiuBundle\Entity\Club;

class LoadFixturesData extends AbstractFixture implements FixtureInterface
{
    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    function load(ObjectManager $manager)
    {
        $this->createClubs($manager);
        $manager->flush();
    }

    public function createClubs(ObjectManager $manager)
    {
        $clubs = array(
            array(
              'U.E. Castellnou',
              'CASTELLNOU',
              '2010',
              'http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',
              'Samarreta verda, pantalons i mitges negres',
              'Samarreta groga, pantalons i mitges blaves',
              'veteranscastellnou@gmail.com', 
              'http://veteranscastellnou.wordpress.com'),
            array(
              'C.V.F. Monistrol',
              'MONISTROL',
              '1996',
              'http://veteranscastellnou.files.wordpress.com/2013/09/monistrol.png',
              'Samarreta, pantalons i mitges vermelles',
              '',
              'Byoff@msn.com',
              'http://cvfmonistrol.hol.es/index.php'),
            array(
              'C.F. Callús',
              'CALLÚS',
              '1921',
              'http://veteranscastellnou.files.wordpress.com/2013/09/callus.jpeg',
              'Samarreta barres vermelles i grogues, pantalons vermells',
              '',
              'clubfutbolcallus@gmail.com',
              'http://www.cfcallus.com'),
            array(
              'C.E. Navàs',
              'NAVÀS',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/navas.png',
              'Samarreta groga, pantalons i mitges negres',
              'Samarreta negre',
              'orijana21@hotmail.com',
              'http://www.cenavas.es'),
            array(
              'ADP. Marroc',
              'MARROC',
              '',
              '',
              'Samarreta, pantalons i mitges verdes',
              '',
              'beteranosmarroquies@hotmail.com',
              ''),
            array(
              'C.E. Castellbell i Vilar ',
              'CASTELLBELL',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/castellbell.png',
              'Samarreta, pantalons i mitges negres',
              '',
              'sebibach@hotmail.es',
              ''),
            array(
              'C.F. Santpedor',
              'SANTPEDOR',
              '1915',
              'http://veteranscastellnou.files.wordpress.com/2013/09/santpedor.jpeg',
              'Samarreta blaugrana, pantalons blau marí i mitges blaugrana',
              '',
              'veteranscfsantpedor@gmail.com',
              'http://www.cfsantpedor.es'),
            array(
              'C.F. Vilomara',
              'VILOMARA',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/vilomara.jpg',
              'Samarreta verd i blanca, pantalons blancs i mitges verdes',
              '',
              'luisgonzalez15@gmail.com',
              ''),
            array(
              'F.C. Artés',
              'ARTÉS',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/artes.jpeg',
              'Samarreta vermella, pantalons negres i mitges vermelles',
              '',
              '',
              'http://www.fcartes.com'),
            array(
              'A.V. Ceip Joan de Palà - La Coromina',
              'JOAN DE PALÀ',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/pala.jpeg',
              '',
              '',
              'avceipjoandepala@gmail.com',
              ''),
            array(
              'C.F. Navarcles',
              'NAVARCLES',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/navarcles.jpeg',
              'Samarreta, pantalons i mitges blaves',
              '',
              '',
              ''),
            array(
              'F.C. Joanenc',
              'SANT JOAN',
              '',
              'http://veteranscastellnou.files.wordpress.com/2013/09/joanenc.jpeg',
              'Samarreta groga, pantalons blaus i mitges grogues',
              '',
              'jlsr15468@gmail.com',
              '')
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

}