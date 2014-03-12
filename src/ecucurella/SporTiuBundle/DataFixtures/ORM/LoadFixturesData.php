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
            array('U.E. Castellnou','CASTELLNOU','2010','bundles/ecucurellasportiu/images/castellnou.png',
              'Samarreta verda, pantalons i mitges negres','Samarreta groga, pantalons i mitges blaves',
              'veteranscastellnou@gmail.com','http://veteranscastellnou.wordpress.com'),
            array('C.V.F. Monistrol','MONISTROL','1996','bundles/ecucurellasportiu/images/monistrol.png',
              'Samarreta, pantalons i mitges vermelles','','Byoff@msn.com','http://cvfmonistrol.hol.es/index.php'),
            array('C.F. Callús','CALLÚS','1921','bundles/ecucurellasportiu/images/callus.jpeg',
              'Samarreta barres vermelles i grogues, pantalons vermells','','clubfutbolcallus@gmail.com',
              'http://www.cfcallus.com'),
            array('C.E. Navàs','NAVÀS','','bundles/ecucurellasportiu/images/navas.png',
              'Samarreta groga, pantalons i mitges negres','Samarreta negre','orijana21@hotmail.com',
              'http://www.cenavas.es'),
            array('ADP. Marroc','MARROC','','','Samarreta, pantalons i mitges verdes','',
              'beteranosmarroquies@hotmail.com',''),
            array('C.E. Castellbell i Vilar','CASTELLBELL','','bundles/ecucurellasportiu/images/castellbell.png',
              'Samarreta, pantalons i mitges negres','','sebibach@hotmail.es',''),
            array('C.F. Santpedor','SANTPEDOR','1915','bundles/ecucurellasportiu/images/santpedor.jpeg',
              'Samarreta blaugrana, pantalons blau marí i mitges blaugrana','','veteranscfsantpedor@gmail.com',
              'http://www.cfsantpedor.es'),
            array('C.F. Vilomara','VILOMARA','','bundles/ecucurellasportiu/images/vilomara.jpg',
              'Samarreta verd i blanca, pantalons blancs i mitges verdes','','luisgonzalez15@gmail.com',''),
            array('F.C. Artés','ARTÉS','','bundles/ecucurellasportiu/images/artes.jpeg',
              'Samarreta vermella, pantalons negres i mitges vermelles','','','http://www.fcartes.com'),
            array('A.V. Ceip Joan de Palà - La Coromina','JOAN DE PALÀ','','bundles/ecucurellasportiu/images/pala.jpeg'
              ,'','','avceipjoandepala@gmail.com',''),
            array('C.F. Navarcles','NAVARCLES','','bundles/ecucurellasportiu/images/navarcles.jpeg',
              'Samarreta, pantalons i mitges blaves','','',''),
            array('F.C. Joanenc','SANT JOAN','','bundles/ecucurellasportiu/images/joanenc.jpeg',
              'Samarreta groga, pantalons blaus i mitges grogues','','jlsr15468@gmail.com','')
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
            //Round1
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
            array(1,1,'12-10-2013 15:30:00',$navas,$navarcles,'PLAYED'),
            array(1,4,'12-10-2013 18:00:00',$joanenc,$monistrol,'PLAYED'),
            array(0,0,'13-10-2013 12:15:00',$callus,$pala,'PLAYED'),
            array(2,2,'12-10-2013 18:30:00',$castellnou,$santpedor,'PLAYED'),
            array(1,0,'12-10-2013 18:30:00',$vilomara,$marroc,'PLAYED'),
            array(2,4,'13-10-2013 11:00:00',$artes,$castellbell,'PLAYED'),
            //Round6
            array(3,0,'19-10-2013 18:30:00',$castellbell,$navas,'PLAYED'),
            array(2,4,'19-10-2013 16:00:00',$marroc,$artes,'PLAYED'),
            array(4,0,'19-10-2013 17:00:00',$vilomara,$santpedor,'PLAYED'),
            array(1,0,'19-10-2013 17:00:00',$pala,$castellnou,'PLAYED'),
            array(2,1,'20-10-2013 11:00:00',$monistrol,$callus,'PLAYED'),
            array(2,2,'19-10-2013 18:30:00',$navarcles,$joanenc,'PLAYED'),
            //Round7
            array(7,0,'26-10-2013 16:00:00',$navas,$joanenc,'PLAYED'),
            array(0,1,'27-10-2013 12:15:00',$callus,$navarcles,'PLAYED'),
            array(1,1,'27-10-2013 09:30:00',$castellnou,$monistrol,'PLAYED'),
            array(4,1,'27-10-2013 10:00:00',$vilomara,$pala,'PLAYED'),
            array(3,3,'27-10-2013 11:00:00',$artes,$santpedor,'PLAYED'),
            array(6,1,'27-10-2013 12:00:00',$castellbell,$marroc,'PLAYED'),
            //Round8
            array(1,2,'09-11-2013 16:00:00',$marroc,$navas,'PLAYED'),
            array(0,8,'09-11-2013 20:15:00',$santpedor,$castellbell,'PLAYED'),
            array(0,9,'09-11-2013 15:30:00',$pala,$artes,'PLAYED'),
            array(2,3,'10-11-2013 11:00:00',$monistrol,$vilomara,'PLAYED'),
            array(3,2,'10-11-2013 12:00:00',$navarcles,$castellnou,'PLAYED'),
            array(0,2,'09-11-2013 18:00:00',$joanenc,$callus,'PLAYED'),
            //Round9
            array(6,0,'16-11-2013 16:00:00',$navas,$callus,'PLAYED'),
            array(7,0,'04-01-2014 16:30:00',$castellnou,$joanenc,'PLAYED'),
            array(5,2,'16-11-2013 16:30:00',$vilomara,$navarcles,'PLAYED'),
            array(0,0,'17-11-2013 11:00:00',$artes,$monistrol,'PLAYED'),
            array(3,0,'16-11-2013 16:00:00',$castellbell,$pala,'PLAYED'),
            array(1,4,'16-11-2013 16:00:00',$marroc,$santpedor,'PLAYED'),
            //Round10
            array(5,0,'23-11-2013 16:00:00',$navas,$santpedor,'PLAYED'),
            array(2,7,'24-11-2013 11:00:00',$pala,$marroc,'PLAYED'),
            array(0,7,'24-11-2013 11:00:00',$monistrol,$castellbell,'PLAYED'),
            array(6,3,'24-11-2013 11:30:00',$navarcles,$artes,'PLAYED'),
            array(0,7,'23-11-2013 18:15:00',$joanenc,$vilomara,'PLAYED'),
            array(1,0,'24-11-2013 12:15:00',$callus,$castellnou,'PLAYED'),
            //Round11
            array(0,3,'30-11-2013 16:30:00',$castellnou,$navas,'PLAYED'),
            array(6,0,'30-11-2013 16:30:00',$vilomara,$callus,'PLAYED'),
            array(5,1,'01-12-2013 11:00:00',$artes,$joanenc,'PLAYED'),
            array(4,3,'04-01-2013 16:00:00',$castellbell,$navarcles,'PLAYED'),
            array(5,2,'30-11-2013 16:00:00',$marroc,$monistrol,'PLAYED'),
            array(3,0,'30-11-2013 18:30:00',$santpedor,$pala,'PLAYED'),
            //Round12
            array(1,3,'14-12-2013 15:30:00',$pala,$navas,'PLAYED'),
            array(2,1,'14-12-2013 18:30:00',$santpedor,$monistrol,'PLAYED'),
            array(1,3,'14-12-2013 16:00:00',$marroc,$navarcles,'PLAYED'),
            array(4,0,'15-12-2013 11:00:00',$castellbell,$joanenc,'PLAYED'),
            array(1,1,'15-12-2013 11:00:00',$artes,$callus,'PLAYED'),
            array(2,2,'14-12-2013 18:15:00',$vilomara,$castellnou,'PLAYED'),
            //Round13
            array(1,3,'21-12-2013 19:00:00',$navas,$vilomara,'PLAYED'),
            array(3,2,'21-12-2013 16:30:00',$castellnou,$artes,'PLAYED'),
            array(0,2,'22-12-2013 12:15:00',$callus,$castellbell,'PLAYED'),
            array(1,4,'21-12-2013 18:15:00',$joanenc,$marroc,'PLAYED'),
            array(5,2,'22-12-2013 11:30:00',$navarcles,$santpedor,'PLAYED'),
            array(2,2,'22-12-2013 11:00:00',$monistrol,$pala,'PLAYED'),
            //Round14
            array(1,4,'29-12-2013 11:00:00',$monistrol,$navas,'PLAYED'),
            array(2,2,'29-12-2013 11:00:00',$pala,$navarcles,'PLAYED'),
            array(4,1,'28-12-2013 16:30:00',$santpedor,$joanenc,'PLAYED'),
            array(1,2,'28-12-2013 16:00:00',$marroc,$callus,'PLAYED'),
            array(4,0,'28-12-2013 16:00:00',$castellbell,$castellnou,'PLAYED'),
            array(0,5,'29-12-2013 11:00:00',$artes,$vilomara,'PLAYED'),
            //Round15
            array(1,2,'11-01-2014 18:00:00',$navas,$artes,'PLAYED'),
            array(1,5,'11-01-2014 18:30:00',$vilomara,$castellbell,'PLAYED'),
            array(0,2,'11-01-2014 16:30:00',$castellnou,$marroc,'PLAYED'),
            array(0,0,'12-01-2014 12:15:00',$callus,$santpedor,'PLAYED'),
            array(1,1,'11-01-2014 18:15:00',$joanenc,$pala,'PLAYED'),
            array(5,1,'12-01-2014 10:30:00',$navarcles,$monistrol,'PLAYED'),
            //Round16
            array(2,3,'19-01-2014 11:30:00',$navarcles,$navas,'PLAYED'),
            array(2,0,'19-01-2014 11:00:00',$monistrol,$joanenc,'PLAYED'),
            array(4,1,'09-03-2014 11:00:00',$pala,$callus,'SUSPENDED'),
            array(4,0,'18-01-2014 18:30:00',$santpedor,$castellnou,'PLAYED'),
            array(0,3,'18-01-2014 16:00:00',$marroc,$vilomara,'PLAYED'),
            array(4,1,'18-01-2014 18:30:00',$castellbell,$artes,'PLAYED'),
            //Round17
            array(2,3,'25-01-2014 20:00:00',$navas,$castellbell,'PLAYED'),
            array(4,2,'26-01-2014 11:00:00',$artes,$marroc,'PLAYED'),
            array(4,1,'25-01-2014 20:30:00',$vilomara,$santpedor,'PLAYED'),
            array(7,1,'25-01-2014 18:30:00',$castellnou,$pala,'PLAYED'),
            array(3,3,'26-01-2014 12:15:00',$joanenc,$navarcles,'PLAYED'),
            array(2,1,'25-01-2014 18:15:00',$callus,$monistrol,'PLAYED'),
            //Round18
            array(0,3,'01-02-2014 18:15:00',$joanenc,$navas,'PLAYED'),
            array(5,1,'02-02-2014 11:00:00',$navarcles,$callus,'PLAYED'),
            array(1,2,'02-02-2014 11:00:00',$monistrol,$castellnou,'PLAYED'),
            array(2,6,'01-02-2014 15:30:00',$pala,$vilomara,'PLAYED'),
            array(4,3,'01-02-2014 20:30:00',$santpedor,$artes,'PLAYED'),
            array(1,2,'02-02-2014 11:00:00',$marroc,$castellbell,'PLAYED'),
            //Round19
            array(6,2,'08-02-2014 16:00:00',$navas,$marroc,'PLAYED'),
            array(4,1,'08-02-2014 16:00:00',$castellbell,$santpedor,'PLAYED'),
            array(1,2,'09-02-2014 11:00:00',$vilomara,$monistrol,'PLAYED'),
            array(6,0,'08-02-2014 18:30:00',$artes,$pala,'PLAYED'),
            array(0,3,'08-02-2014 18:30:00',$castellnou,$navarcles,'PLAYED'),
            array(2,1,'09-02-2014 12:15:00',$callus,$joanenc,'PLAYED'),
            //Round20
            array(0,1,'16-02-2014 12:15:00',$callus,$navas,'PLAYED'),
            array(1,1,'15-02-2014 18:15:00',$joanenc,$castellnou,'PLAYED'),
            array(6,5,'16-02-2014 12:15:00',$navarcles,$vilomara,'PLAYED'),
            array(5,2,'02-03-2014 11:00:00',$pala,$castellbell,'PLAYED'),
            array(0,0,'16-02-2014 11:00:00',$monistrol,$artes,'PLAYED'),
            array(2,1,'15-02-2014 20:00:00',$santpedor,$marroc,'PLAYED'),
            //Round21
            array(1,1,'22-02-2014 16:30:00',$castellnou,$callus,'PLAYED'),
            array(0,5,'22-02-2014 20:00:00',$santpedor,$navas,'PLAYED'),
            array(4,0,'22-02-2014 16:00:00',$marroc,$pala,'PLAYED'),
            array(4,0,'22-02-2014 16:00:00',$castellbell,$monistrol,'PLAYED'),
            array(3,2,'23-02-2014 11:00:00',$artes,$navarcles,'PLAYED'),
            array(4,1,'22-02-2014 18:30:00',$vilomara,$joanenc,'PLAYED'),
            //Round22
            array(0,0,'15-03-2014 18:00:00',$navas,$castellnou,'SCHEDULED'),
            array(0,0,'16-03-2014 12:15:00',$callus,$vilomara,'SCHEDULED'),
            array(0,0,'15-03-2014 18:15:00',$joanenc,$artes,'SCHEDULED'),
            array(0,0,'16-03-2014 10:30:00',$navarcles,$castellbell,'SCHEDULED'),
            array(0,0,'16-03-2014 11:00:00',$monistrol,$marroc,'SCHEDULED'),
            array(0,0,'15-03-2014 16:00:00',$pala,$santpedor,'SCHEDULED')
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