<?php

namespace ecucurella\SporTiuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ecucurella\SporTiuBundle\Entity\Club;
use ecucurella\SporTiuBundle\Entity\Game;

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
        $this->createGames($manager);
        $manager->flush();
    }

    public function createClubs(ObjectManager $manager)
    {
        $clubs = array(
            array(
              'U.E. Castellnou',
              'CASTELLNOU',
              '2010',
              'bundles/ecucurellasportiu/images/castellnou.png',
              'Samarreta verda, pantalons i mitges negres',
              'Samarreta groga, pantalons i mitges blaves',
              'veteranscastellnou@gmail.com', 
              'http://veteranscastellnou.wordpress.com'),
            array(
              'C.V.F. Monistrol',
              'MONISTROL',
              '1996',
              'bundles/ecucurellasportiu/images/monistrol.png',
              'Samarreta, pantalons i mitges vermelles',
              '',
              'Byoff@msn.com',
              'http://cvfmonistrol.hol.es/index.php'),
            array(
              'C.F. Callús',
              'CALLÚS',
              '1921',
              'bundles/ecucurellasportiu/images/callus.jpeg',
              'Samarreta barres vermelles i grogues, pantalons vermells',
              '',
              'clubfutbolcallus@gmail.com',
              'http://www.cfcallus.com'),
            array(
              'C.E. Navàs',
              'NAVÀS',
              '',
              'bundles/ecucurellasportiu/images/navas.png',
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
              'C.E. Castellbell i Vilar',
              'CASTELLBELL',
              '',
              'bundles/ecucurellasportiu/images/castellbell.png',
              'Samarreta, pantalons i mitges negres',
              '',
              'sebibach@hotmail.es',
              ''),
            array(
              'C.F. Santpedor',
              'SANTPEDOR',
              '1915',
              'bundles/ecucurellasportiu/images/santpedor.jpeg',
              'Samarreta blaugrana, pantalons blau marí i mitges blaugrana',
              '',
              'veteranscfsantpedor@gmail.com',
              'http://www.cfsantpedor.es'),
            array(
              'C.F. Vilomara',
              'VILOMARA',
              '',
              'bundles/ecucurellasportiu/images/vilomara.jpg',
              'Samarreta verd i blanca, pantalons blancs i mitges verdes',
              '',
              'luisgonzalez15@gmail.com',
              ''),
            array(
              'F.C. Artés',
              'ARTÉS',
              '',
              'bundles/ecucurellasportiu/images/artes.jpeg',
              'Samarreta vermella, pantalons negres i mitges vermelles',
              '',
              '',
              'http://www.fcartes.com'),
            array(
              'A.V. Ceip Joan de Palà - La Coromina',
              'JOAN DE PALÀ',
              '',
              'bundles/ecucurellasportiu/images/pala.jpeg',
              '',
              '',
              'avceipjoandepala@gmail.com',
              ''),
            array(
              'C.F. Navarcles',
              'NAVARCLES',
              '',
              'bundles/ecucurellasportiu/images/navarcles.jpeg',
              'Samarreta, pantalons i mitges blaves',
              '',
              '',
              ''),
            array(
              'F.C. Joanenc',
              'SANT JOAN',
              '',
              'bundles/ecucurellasportiu/images/joanenc.jpeg',
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

    public function createGames(ObjectManager $manager)
    {
        
        $castellnou = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'U.E. Castellnou'));
        $monistrol = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.V.F. Monistrol'));
        $callus = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Callús'));
        $navas = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Navàs'));
        $marroc = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'ADP. Marroc'));
        $castellbell = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Castellbell i Vilar'));
        $santpedor = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Santpedor'));
        $vilomara = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Vilomara'));
        $artes = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Artés'));
        $pala = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'A.V. Ceip Joan de Palà - La Coromina'));
        $navarcles = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Navarcles'));
        $joanenc = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Joanenc'));  

        $games = array(
            array(
              1,
              1,
              '22-02-2014 16:30:00',
              $castellnou,
              $callus,
              'PLAYED'
              ),
            array(
              0,
              5,
              '22-02-2014 20:00:00',
              $santpedor,
              $navas,
              'PLAYED'
              ),
            array(
              4,
              0,
              '22-02-2014 16:00:00',
              $marroc,
              $pala,
              'PLAYED'
              ),
            array(
              4,
              0,
              '22-02-2014 16:00:00',
              $castellbell,
              $monistrol,
              'PLAYED'
              ),
            array(
              3,
              2,
              '23-02-2014 11:00:00',
              $artes,
              $navarcles,
              'PLAYED'
              ),
            array(
              4,
              1,
              '22-02-2014 18:30:00',
              $vilomara,
              $joanenc,
              'PLAYED'
              ),
            array(
              0,
              0,
              '16-03-2014 00:00:00',
              $navas,
              $castellnou,
              'CALENDAR'
              ),
            array(
              0,
              0,
              '16-03-2014 00:00:00',
              $callus,
              $vilomara,
              'CALENDAR'
              ),
            array(
              0,
              0,
              '16-03-2014 00:00:00',
              $joanenc,
              $artes,
              'CALENDAR'
              ),
            array(
              0,
              0,
              '16-03-2014 00:00:00',
              $navarcles,
              $castellbell,
              'CALENDAR'
              ),
            array(
              0,
              0,
              '16-03-2014 00:00:00',
              $monistrol,
              $marroc,
              'CALENDAR'
              ),
            array(
              0,
              0,
              '16-03-2014 00:00:00',
              $pala,
              $santpedor,
              'CALENDAR'
              ),
            //Round 1
            array(5,1,'14-09-2013 18:00:00',$navas,$pala,'PLAYED'),
            array(4,2,'15-09-2013 11:00:00',$monistrol,$santpedor,'PLAYED'),
            array(2,1,'14-09-2013 16:30:00',$navarcles,$marroc,'PLAYED'),
            array(1,2,'14-09-2013 18:15:00',$joanenc,$castellbell,'PLAYED'),
            array(0,3,'15-09-2013 11:00:00',$callus,$artes,'PLAYED'),
            array(0,2,'14-09-2013 18:00:00',$castellnou,$vilomara,'PLAYED'),
            //Round2
            array(3,1,'21-09-2013 18:00:00',$vilomara,$navas,'PLAYED'),
            array(2,0,'22-09-2013 11:00:00',$artes,$castellnou,'PLAYED'),
            array(3,1,'21-09-2013 18:30:00',$castellbell,$callus,'PLAYED'),
            array(0,0,'21-09-2013 16:30:00',$marroc,$joanenc,'PLAYED'),
            array(1,0,'21-09-2013 18:30:00',$santpedor,$navarcles,'PLAYED'),
            array(1,0,'21-09-2013 17:00:00',$pala,$monistrol,'PLAYED'),
            //Round3
            array(2,2,'28-09-2013 16:00:00',$navas,$monistrol,'PLAYED'),
            array(8,0,'28-09-2013 18:30:00',$navarcles,$pala,'PLAYED'),
            array(3,4,'28-09-2013 20:00:00',$joanenc,$santpedor,'PLAYED'),
            array(1,0,'29-09-2013 11:00:00',$callus,$marroc,'PLAYED'),
            array(1,4,'28-09-2013 18:30:00',$castellnou,$castellbell,'PLAYED'),
            array(3,1,'28-09-2013 16:15:00',$vilomara,$artes,'PLAYED'),
            //Round4
            array(0,5,'06-10-2013 11:00:00',$artes,$navas,'PLAYED'),
            array(3,4,'05-10-2013 16:00:00',$castellbell,$vilomara,'PLAYED'),
            array(0,3,'05-10-2013 16:00:00',$marroc,$castellnou,'PLAYED'),
            array(6,3,'05-10-2013 20:00:00',$santpedor,$callus,'PLAYED'),
            array(2,1,'06-10-2013 11:00:00',$pala,$joanenc,'PLAYED'),
            array(2,1,'06-10-2013 11:00:00',$monistrol,$navarcles,'PLAYED'),
            //Round5
            /*array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            //Round6
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            //Round7
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            //Round8
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            //Round9
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            //Round10
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),
            array(,,'',$,$,'PLAYED'),*/
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