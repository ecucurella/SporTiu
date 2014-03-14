<?php

namespace ecucurella\SporTiuBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ecucurella\SporTiuBundle\Entity\Club;
use ecucurella\SporTiuBundle\Entity\Game;
use ecucurella\SporTiuBundle\Entity\League;
use ecucurella\SporTiuBundle\Entity\Round;

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
        $this->createLeagues($manager);
        $manager->flush();
        $this->createRounds($manager);
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
        
        //Clubs
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

        //Rounds
        $round1 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1 - GRUP B'));
        $round2 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2 - GRUP B'));
        $round3 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3 - GRUP B'));
        $round4 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4 - GRUP B'));
        $round5 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5 - GRUP B'));
        $round6 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6 - GRUP B'));
        $round7 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7 - GRUP B'));
        $round8 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8 - GRUP B'));
        $round9 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9 - GRUP B'));
        $round10 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10 - GRUP B'));
        $round11 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11 - GRUP B'));
        $round12 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12 - GRUP B'));
        $round13 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13 - GRUP B'));
        $round14 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14 - GRUP B'));
        $round15 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15 - GRUP B'));
        $round16 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16 - GRUP B'));
        $round17 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17 - GRUP B'));
        $round18 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18 - GRUP B'));
        $round19 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19 - GRUP B'));
        $round20 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20 - GRUP B'));
        $round21 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21 - GRUP B'));
        $round22 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22 - GRUP B'));

        $games = array(
            //Round1
            array(5,1,'14-09-2013 18:00:00',$navas,$pala,'PLAYED',$round1),
            array(4,2,'15-09-2013 11:00:00',$monistrol,$santpedor,'PLAYED',$round1),
            array(2,1,'14-09-2013 16:30:00',$navarcles,$marroc,'PLAYED',$round1),
            array(1,2,'14-09-2013 18:15:00',$joanenc,$castellbell,'PLAYED',$round1),
            array(0,3,'15-09-2013 11:00:00',$callus,$artes,'PLAYED',$round1),
            array(0,2,'14-09-2013 18:00:00',$castellnou,$vilomara,'PLAYED',$round1),
            //Round2
            array(3,1,'21-09-2013 18:00:00',$vilomara,$navas,'PLAYED',$round2),
            array(2,0,'22-09-2013 11:00:00',$artes,$castellnou,'PLAYED',$round2),
            array(3,1,'21-09-2013 18:30:00',$castellbell,$callus,'PLAYED',$round2),
            array(0,0,'21-09-2013 16:30:00',$marroc,$joanenc,'PLAYED',$round2),
            array(1,0,'21-09-2013 18:30:00',$santpedor,$navarcles,'PLAYED',$round2),
            array(1,0,'21-09-2013 17:00:00',$pala,$monistrol,'PLAYED',$round2),
            //Round3
            array(2,2,'28-09-2013 16:00:00',$navas,$monistrol,'PLAYED',$round3),
            array(8,0,'28-09-2013 18:30:00',$navarcles,$pala,'PLAYED',$round3),
            array(3,4,'28-09-2013 20:00:00',$joanenc,$santpedor,'PLAYED',$round3),
            array(1,0,'29-09-2013 11:00:00',$callus,$marroc,'PLAYED',$round3),
            array(1,4,'28-09-2013 18:30:00',$castellnou,$castellbell,'PLAYED',$round3),
            array(3,1,'28-09-2013 16:15:00',$vilomara,$artes,'PLAYED',$round3),
            //Round4
            array(0,5,'06-10-2013 11:00:00',$artes,$navas,'PLAYED',$round4),
            array(3,4,'05-10-2013 16:00:00',$castellbell,$vilomara,'PLAYED',$round4),
            array(0,3,'05-10-2013 16:00:00',$marroc,$castellnou,'PLAYED',$round4),
            array(6,3,'05-10-2013 20:00:00',$santpedor,$callus,'PLAYED',$round4),
            array(2,1,'06-10-2013 11:00:00',$pala,$joanenc,'PLAYED',$round4),
            array(2,1,'06-10-2013 11:00:00',$monistrol,$navarcles,'PLAYED',$round4),
            //Round5
            array(1,1,'12-10-2013 15:30:00',$navas,$navarcles,'PLAYED',$round5),
            array(1,4,'12-10-2013 18:00:00',$joanenc,$monistrol,'PLAYED',$round5),
            array(0,0,'13-10-2013 12:15:00',$callus,$pala,'PLAYED',$round5),
            array(2,2,'12-10-2013 18:30:00',$castellnou,$santpedor,'PLAYED',$round5),
            array(1,0,'12-10-2013 18:30:00',$vilomara,$marroc,'PLAYED',$round5),
            array(2,4,'13-10-2013 11:00:00',$artes,$castellbell,'PLAYED',$round5),
            //Round6
            array(3,0,'19-10-2013 18:30:00',$castellbell,$navas,'PLAYED',$round6),
            array(2,4,'19-10-2013 16:00:00',$marroc,$artes,'PLAYED',$round6),
            array(4,0,'19-10-2013 17:00:00',$vilomara,$santpedor,'PLAYED',$round6),
            array(1,0,'19-10-2013 17:00:00',$pala,$castellnou,'PLAYED',$round6),
            array(2,1,'20-10-2013 11:00:00',$monistrol,$callus,'PLAYED',$round6),
            array(2,2,'19-10-2013 18:30:00',$navarcles,$joanenc,'PLAYED',$round6),
            //Round7
            array(7,0,'26-10-2013 16:00:00',$navas,$joanenc,'PLAYED',$round7),
            array(0,1,'27-10-2013 12:15:00',$callus,$navarcles,'PLAYED',$round7),
            array(1,1,'27-10-2013 09:30:00',$castellnou,$monistrol,'PLAYED',$round7),
            array(4,1,'27-10-2013 10:00:00',$vilomara,$pala,'PLAYED',$round7),
            array(3,3,'27-10-2013 11:00:00',$artes,$santpedor,'PLAYED',$round7),
            array(6,1,'27-10-2013 12:00:00',$castellbell,$marroc,'PLAYED',$round7),
            //Round8
            array(1,2,'09-11-2013 16:00:00',$marroc,$navas,'PLAYED',$round8),
            array(0,8,'09-11-2013 20:15:00',$santpedor,$castellbell,'PLAYED',$round8),
            array(0,9,'09-11-2013 15:30:00',$pala,$artes,'PLAYED',$round8),
            array(2,3,'10-11-2013 11:00:00',$monistrol,$vilomara,'PLAYED',$round8),
            array(3,2,'10-11-2013 12:00:00',$navarcles,$castellnou,'PLAYED',$round8),
            array(0,2,'09-11-2013 18:00:00',$joanenc,$callus,'PLAYED',$round8),
            //Round9
            array(6,0,'16-11-2013 16:00:00',$navas,$callus,'PLAYED',$round9),
            array(7,0,'04-01-2014 16:30:00',$castellnou,$joanenc,'PLAYED',$round9),
            array(5,2,'16-11-2013 16:30:00',$vilomara,$navarcles,'PLAYED',$round9),
            array(0,0,'17-11-2013 11:00:00',$artes,$monistrol,'PLAYED',$round9),
            array(3,0,'16-11-2013 16:00:00',$castellbell,$pala,'PLAYED',$round9),
            array(1,4,'16-11-2013 16:00:00',$marroc,$santpedor,'PLAYED',$round9),
            //Round10
            array(5,0,'23-11-2013 16:00:00',$navas,$santpedor,'PLAYED',$round10),
            array(2,7,'24-11-2013 11:00:00',$pala,$marroc,'PLAYED',$round10),
            array(0,7,'24-11-2013 11:00:00',$monistrol,$castellbell,'PLAYED',$round10),
            array(6,3,'24-11-2013 11:30:00',$navarcles,$artes,'PLAYED',$round10),
            array(0,7,'23-11-2013 18:15:00',$joanenc,$vilomara,'PLAYED',$round10),
            array(1,0,'24-11-2013 12:15:00',$callus,$castellnou,'PLAYED',$round10),
            //Round11
            array(0,3,'30-11-2013 16:30:00',$castellnou,$navas,'PLAYED',$round11),
            array(6,0,'30-11-2013 16:30:00',$vilomara,$callus,'PLAYED',$round11),
            array(5,1,'01-12-2013 11:00:00',$artes,$joanenc,'PLAYED',$round11),
            array(4,3,'04-01-2013 16:00:00',$castellbell,$navarcles,'PLAYED',$round11),
            array(5,2,'30-11-2013 16:00:00',$marroc,$monistrol,'PLAYED',$round11),
            array(3,0,'30-11-2013 18:30:00',$santpedor,$pala,'PLAYED',$round11),
            //Round12
            array(1,3,'14-12-2013 15:30:00',$pala,$navas,'PLAYED',$round12),
            array(2,1,'14-12-2013 18:30:00',$santpedor,$monistrol,'PLAYED',$round12),
            array(1,3,'14-12-2013 16:00:00',$marroc,$navarcles,'PLAYED',$round12),
            array(4,0,'15-12-2013 11:00:00',$castellbell,$joanenc,'PLAYED',$round12),
            array(1,1,'15-12-2013 11:00:00',$artes,$callus,'PLAYED',$round12),
            array(2,2,'14-12-2013 18:15:00',$vilomara,$castellnou,'PLAYED',$round12),
            //Round13
            array(1,3,'21-12-2013 19:00:00',$navas,$vilomara,'PLAYED',$round13),
            array(3,2,'21-12-2013 16:30:00',$castellnou,$artes,'PLAYED',$round13),
            array(0,2,'22-12-2013 12:15:00',$callus,$castellbell,'PLAYED',$round13),
            array(1,4,'21-12-2013 18:15:00',$joanenc,$marroc,'PLAYED',$round13),
            array(5,2,'22-12-2013 11:30:00',$navarcles,$santpedor,'PLAYED',$round13),
            array(2,2,'22-12-2013 11:00:00',$monistrol,$pala,'PLAYED',$round13),
            //Round14
            array(1,4,'29-12-2013 11:00:00',$monistrol,$navas,'PLAYED',$round14),
            array(2,2,'29-12-2013 11:00:00',$pala,$navarcles,'PLAYED',$round14),
            array(4,1,'28-12-2013 16:30:00',$santpedor,$joanenc,'PLAYED',$round14),
            array(1,2,'28-12-2013 16:00:00',$marroc,$callus,'PLAYED',$round14),
            array(4,0,'28-12-2013 16:00:00',$castellbell,$castellnou,'PLAYED',$round14),
            array(0,5,'29-12-2013 11:00:00',$artes,$vilomara,'PLAYED',$round14),
            //Round15
            array(1,2,'11-01-2014 18:00:00',$navas,$artes,'PLAYED',$round15),
            array(1,5,'11-01-2014 18:30:00',$vilomara,$castellbell,'PLAYED',$round15),
            array(0,2,'11-01-2014 16:30:00',$castellnou,$marroc,'PLAYED',$round15),
            array(0,0,'12-01-2014 12:15:00',$callus,$santpedor,'PLAYED',$round15),
            array(1,1,'11-01-2014 18:15:00',$joanenc,$pala,'PLAYED',$round15),
            array(5,1,'12-01-2014 10:30:00',$navarcles,$monistrol,'PLAYED',$round15),
            //Round16
            array(2,3,'19-01-2014 11:30:00',$navarcles,$navas,'PLAYED',$round16),
            array(2,0,'19-01-2014 11:00:00',$monistrol,$joanenc,'PLAYED',$round16),
            array(4,1,'09-03-2014 11:00:00',$pala,$callus,'PLAYED',$round16),
            array(4,0,'18-01-2014 18:30:00',$santpedor,$castellnou,'PLAYED',$round16),
            array(0,3,'18-01-2014 16:00:00',$marroc,$vilomara,'PLAYED',$round16),
            array(4,1,'18-01-2014 18:30:00',$castellbell,$artes,'PLAYED',$round16),
            //Round17
            array(2,3,'25-01-2014 20:00:00',$navas,$castellbell,'PLAYED',$round17),
            array(4,2,'26-01-2014 11:00:00',$artes,$marroc,'PLAYED',$round17),
            array(4,1,'25-01-2014 20:30:00',$vilomara,$santpedor,'PLAYED',$round17),
            array(7,1,'25-01-2014 18:30:00',$castellnou,$pala,'PLAYED',$round17),
            array(3,3,'26-01-2014 12:15:00',$joanenc,$navarcles,'PLAYED',$round17),
            array(2,1,'25-01-2014 18:15:00',$callus,$monistrol,'PLAYED',$round17),
            //Round18
            array(0,3,'01-02-2014 18:15:00',$joanenc,$navas,'PLAYED',$round18),
            array(5,1,'02-02-2014 11:00:00',$navarcles,$callus,'PLAYED',$round18),
            array(1,2,'02-02-2014 11:00:00',$monistrol,$castellnou,'PLAYED',$round18),
            array(2,6,'01-02-2014 15:30:00',$pala,$vilomara,'PLAYED',$round18),
            array(4,3,'01-02-2014 20:30:00',$santpedor,$artes,'PLAYED',$round18),
            array(1,2,'02-02-2014 11:00:00',$marroc,$castellbell,'PLAYED',$round18),
            //Round19
            array(6,2,'08-02-2014 16:00:00',$navas,$marroc,'PLAYED',$round19),
            array(4,1,'08-02-2014 16:00:00',$castellbell,$santpedor,'PLAYED',$round19),
            array(1,2,'09-02-2014 11:00:00',$vilomara,$monistrol,'PLAYED',$round19),
            array(6,0,'08-02-2014 18:30:00',$artes,$pala,'PLAYED',$round19),
            array(0,3,'08-02-2014 18:30:00',$castellnou,$navarcles,'PLAYED',$round19),
            array(2,1,'09-02-2014 12:15:00',$callus,$joanenc,'PLAYED',$round19),
            //Round20
            array(0,1,'16-02-2014 12:15:00',$callus,$navas,'PLAYED',$round20),
            array(1,1,'15-02-2014 18:15:00',$joanenc,$castellnou,'PLAYED',$round20),
            array(6,5,'16-02-2014 12:15:00',$navarcles,$vilomara,'PLAYED',$round20),
            array(5,2,'02-03-2014 11:00:00',$pala,$castellbell,'PLAYED',$round20),
            array(0,0,'16-02-2014 11:00:00',$monistrol,$artes,'PLAYED',$round20),
            array(2,1,'15-02-2014 20:00:00',$santpedor,$marroc,'PLAYED',$round20),
            //Round21
            array(1,1,'22-02-2014 16:30:00',$castellnou,$callus,'PLAYED',$round21),
            array(0,5,'22-02-2014 20:00:00',$santpedor,$navas,'PLAYED',$round21),
            array(4,0,'22-02-2014 16:00:00',$marroc,$pala,'PLAYED',$round21),
            array(4,0,'22-02-2014 16:00:00',$castellbell,$monistrol,'PLAYED',$round21),
            array(3,2,'23-02-2014 11:00:00',$artes,$navarcles,'PLAYED',$round21),
            array(4,1,'22-02-2014 18:30:00',$vilomara,$joanenc,'PLAYED',$round21),
            //Round22
            array(0,0,'15-03-2014 18:00:00',$navas,$castellnou,'SCHEDULED',$round22),
            array(0,0,'16-03-2014 12:15:00',$callus,$vilomara,'SCHEDULED',$round22),
            array(0,0,'15-03-2014 18:15:00',$joanenc,$artes,'SCHEDULED',$round22),
            array(0,0,'16-03-2014 10:30:00',$navarcles,$castellbell,'SCHEDULED',$round22),
            array(0,0,'16-03-2014 11:00:00',$monistrol,$marroc,'SCHEDULED',$round22),
            array(0,0,'15-03-2014 16:00:00',$pala,$santpedor,'SCHEDULED',$round22)
        );

        foreach ($games as $game_fixture) {
            $game = new Game();
            $game->setLocalpoints($game_fixture[0]);
            $game->setVisitorpoints($game_fixture[1]);
            $game->setGamedate(date_create_from_format('d-m-Y H:i:s',$game_fixture[2]));
            $game = $game->setLocalclub($game_fixture[3]);
            $game = $game->setVisitorclub($game_fixture[4]);
            $game->setGamestate($game_fixture[5]);
            $game = $game->setRound($game_fixture[6]);
            $manager->persist($game);
        }
    }

    public function createLeagues(ObjectManager $manager)
    {
        $league = new League();
        $league->setName('Lliga intercomarcal de veterans - GRUP A');
        $league->setDateBegin(date_create_from_format('d-m-Y','01-09-2013'));
        $league->setDateEnd(date_create_from_format('d-m-Y','30-06-2014'));
        $manager->persist($league);

        $league = new League();
        $league->setName('Lliga intercomarcal de veterans - GRUP B');
        $league->setDateBegin(date_create_from_format('d-m-Y','01-09-2013'));
        $league->setDateEnd(date_create_from_format('d-m-Y','30-06-2014'));
        $manager->persist($league);

        $league = new League();
        $league->setName('Lliga intercomarcal de veterans - GRUP C');
        $league->setDateBegin(date_create_from_format('d-m-Y','01-09-2013'));
        $league->setDateEnd(date_create_from_format('d-m-Y','30-06-2014'));
        $manager->persist($league);
    }

    public function createRounds(ObjectManager $manager)
    {

        $leagueA = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans - GRUP A'));
        $leagueB = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans - GRUP B'));
        $leagueC = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans - GRUP C'));

        $rounds = array(
            array('Jornada1 - GRUP A','1',$leagueA),
            array('Jornada2 - GRUP A','2',$leagueA),
            array('Jornada3 - GRUP A','3',$leagueA),
            array('Jornada4 - GRUP A','4',$leagueA),
            array('Jornada5 - GRUP A','5',$leagueA),
            array('Jornada6 - GRUP A','6',$leagueA),
            array('Jornada7 - GRUP A','7',$leagueA),
            array('Jornada8 - GRUP A','8',$leagueA),
            array('Jornada9 - GRUP A','9',$leagueA),
            array('Jornada10 - GRUP A','10',$leagueA),
            array('Jornada11 - GRUP A','11',$leagueA),
            array('Jornada12 - GRUP A','12',$leagueA),
            array('Jornada13 - GRUP A','13',$leagueA),
            array('Jornada14 - GRUP A','14',$leagueA),
            array('Jornada15 - GRUP A','15',$leagueA),
            array('Jornada16 - GRUP A','16',$leagueA),
            array('Jornada17 - GRUP A','17',$leagueA),
            array('Jornada18 - GRUP A','18',$leagueA),
            array('Jornada19 - GRUP A','19',$leagueA),
            array('Jornada20 - GRUP A','20',$leagueA),
            array('Jornada21 - GRUP A','21',$leagueA),
            array('Jornada22 - GRUP A','22',$leagueA),
            array('Jornada1 - GRUP B','1',$leagueB),
            array('Jornada2 - GRUP B','2',$leagueB),
            array('Jornada3 - GRUP B','3',$leagueB),
            array('Jornada4 - GRUP B','4',$leagueB),
            array('Jornada5 - GRUP B','5',$leagueB),
            array('Jornada6 - GRUP B','6',$leagueB),
            array('Jornada7 - GRUP B','7',$leagueB),
            array('Jornada8 - GRUP B','8',$leagueB),
            array('Jornada9 - GRUP B','9',$leagueB),
            array('Jornada10 - GRUP B','10',$leagueB),
            array('Jornada11 - GRUP B','11',$leagueB),
            array('Jornada12 - GRUP B','12',$leagueB),
            array('Jornada13 - GRUP B','13',$leagueB),
            array('Jornada14 - GRUP B','14',$leagueB),
            array('Jornada15 - GRUP B','15',$leagueB),
            array('Jornada16 - GRUP B','16',$leagueB),
            array('Jornada17 - GRUP B','17',$leagueB),
            array('Jornada18 - GRUP B','18',$leagueB),
            array('Jornada19 - GRUP B','19',$leagueB),
            array('Jornada20 - GRUP B','20',$leagueB),
            array('Jornada21 - GRUP B','21',$leagueB),
            array('Jornada22 - GRUP B','22',$leagueB),
            array('Jornada1 - GRUP C','1',$leagueC),
            array('Jornada2 - GRUP C','2',$leagueC),
            array('Jornada3 - GRUP C','3',$leagueC),
            array('Jornada4 - GRUP C','4',$leagueC),
            array('Jornada5 - GRUP C','5',$leagueC),
            array('Jornada6 - GRUP C','6',$leagueC),
            array('Jornada7 - GRUP C','7',$leagueC),
            array('Jornada8 - GRUP C','8',$leagueC),
            array('Jornada9 - GRUP C','9',$leagueC),
            array('Jornada10 - GRUP C','10',$leagueC),
            array('Jornada11 - GRUP C','11',$leagueC),
            array('Jornada12 - GRUP C','12',$leagueC),
            array('Jornada13 - GRUP C','13',$leagueC),
            array('Jornada14 - GRUP C','14',$leagueC),
            array('Jornada15 - GRUP C','15',$leagueC),
            array('Jornada16 - GRUP C','16',$leagueC),
            array('Jornada17 - GRUP C','17',$leagueC),
            array('Jornada18 - GRUP C','18',$leagueC),
            array('Jornada19 - GRUP C','19',$leagueC),
            array('Jornada20 - GRUP C','20',$leagueC),
            array('Jornada21 - GRUP C','21',$leagueC),
            array('Jornada22 - GRUP C','22',$leagueC),
        );

        foreach ($rounds as $round_fixture) {
            $round = new Round();
            $round->setName($round_fixture[0]);
            $round->setOrdernum($round_fixture[1]);
            $round = $round->setLeague($round_fixture[2]);  
            $manager->persist($round);
        }
    }
}