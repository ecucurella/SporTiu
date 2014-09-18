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
            array('ADP. Marroc','MARROC','','bundles/ecucurellasportiu/images/generic.jpg','Samarreta, pantalons i mitges verdes','',
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
              'Samarreta groga, pantalons blaus i mitges grogues','','jlsr15468@gmail.com',''),
            array('Club Amèrica','AMERICA','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('AT. Castellbell','CASTELLBELL AT.','','bundles/ecucurellasportiu/images/castellbell.jpeg',
              '','','davidnadaldedios@hotmail.com',''),
            array('Guardiolenca C.F.','GUARDIOLA','','bundles/ecucurellasportiu/images/guardiolenca.jpeg',
              'Samarreta vermella, groga i blava, pantalons i mitges blaves','','vetguardiola@hotmail.com',''),
            array('U.D. Balsareny','BALSARENY UD.','','bundles/ecucurellasportiu/images/balsareny.jpeg',
              'Samarreta blanca i vermella, pantalons vermells i mitges blanques','','VUDBALSARENY@hotmail.es',''),
            array('C.F. Solsona','SOLSONA','1928','bundles/ecucurellasportiu/images/solsona.jpeg',
              'Samarreta blava amb franja blanca, pantalons negres i mitges blaves',
              'Samarreta vermella amb franja blava, pantalons negres i mitges vermelles','','http://www.cfsolsona.cat'),
            array('C.E. Avinyó','AVINYÓ','','bundles/ecucurellasportiu/images/avinyo.jpeg',
              'Samarreta verda i blanca, pantalons blancs i mitges verdiblanques','','','veteransavinyo@gmail.com'),
            array('C.F. AT. Gironella','GIRONELLA','1911','bundles/ecucurellasportiu/images/gironella.jpeg',
              'Samarreta groga i blanca, pantalons negres i mitges blanques','Samarreta, pantalons i mitges negres',
              'atg@atgironella.com','http://atgironella.com/'),
            array('F.C. Pirinaica','PIRINAICA','','bundles/ecucurellasportiu/images/pirinaica.gif',
              'Samarreta, pantalons i mitges vermelles','','avfcpirinaica@hotmail.com',''),            
            array('C.F. Castellgalí','CASTELLGALÍ','','bundles/ecucurellasportiu/images/castellgali.jpeg',
              'Samarreta blaugrana, pantalons i mitges blaves','','',''),
            array('Balsareny','BALSARENY','','bundles/ecucurellasportiu/images/generic.jpg',
              'Samarreta vermella, pantalons blancs','','',''),
            array('C.F. Castellet','CASTELLET','','bundles/ecucurellasportiu/images/castellet.png',
              'Samarreta blaugrana, pantalons i mitges blaves','','',''),
            array('C.D. La Coromina','LA COROMINA','','bundles/ecucurellasportiu/images/lacoromina.png',
              'Samarreta blanca i vermella, pantalons negres','','',''),
            array('C.E. Berga','BERGA','1913','bundles/ecucurellasportiu/images/berga.jpeg',
              'Samarreta blanca i vermella, pantalons vermells','','','http://www.ceberga.cat'),
            array('Minorisa La Font','LA FONT','2011','bundles/ecucurellasportiu/images/lafont.jpg',
              'Samarreta, pantalons i mitges negres','','','http://www.ceminorisa.com'),
            array('C.E. Sallent','SALLENT','1913','bundles/ecucurellasportiu/images/sallent.jpeg',
              'Samarreta blaugrana, pantalons blaus i mitges blaugranes','','','http://cesallent.org'),
            array('La Salle Manresa','LA SALLE','','bundles/ecucurellasportiu/images/lasalle.jpeg',
              'Samarreta blanca i vermella, pantalons vermells i mitges blanques i vermelles','','','')/*,
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','',''),
            array('','','','bundles/ecucurellasportiu/images/generic.jpg',
              '','','','')*/
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
        $america = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Club Amèrica'));  
        $atcastellbell = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'AT. Castellbell'));  
        $guardiolenca = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Guardiolenca C.F.'));  
        $udbalsareny = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'U.D. Balsareny'));  
        $solsona = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Solsona'));  
        $avinyo = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Avinyó'));  
        $atgironella = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. AT. Gironella'));  
        $pirinaica = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Pirinaica'));  
        $castellgali = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Castellgalí'));  
        $balsareny = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Balsareny'));  
        $castellet = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Castellet'));  
        $lacoromina = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.D. La Coromina'));  
        $berga = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Berga'));  
        $minorisa = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Minorisa La Font'));  
        $sallent = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Sallent'));  
        $lasalle = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'La Salle Manresa'));  
        //$ = $manager->getRepository('ecucurellaSporTiuBundle:Club')
        //  ->findOneBy(array('name' => ''));  

        //League 2013/2014
        $leagueB1314 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP B',
                            'season' => 'Temporada 2013/2014'));
        //League 2014/2015
        $leagueA1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP A',
                            'season' => 'Temporada 2014/2015'));
        
        $leagueB1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP B',
                            'season' => 'Temporada 2014/2015'));

        //Rounds 2013/2014
        $round13141 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $leagueB1314));
        $round13142 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $leagueB1314));
        $round13143 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $leagueB1314));
        $round13144 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $leagueB1314));
        $round13145 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $leagueB1314));
        $round13146 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $leagueB1314));
        $round13147 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $leagueB1314));
        $round13148 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $leagueB1314));
        $round13149 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $leagueB1314));
        $round131410 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $leagueB1314));
        $round131411 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $leagueB1314));
        $round131412 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $leagueB1314));
        $round131413 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $leagueB1314));
        $round131414 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $leagueB1314));
        $round131415 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $leagueB1314));
        $round131416 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $leagueB1314));
        $round131417 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $leagueB1314));
        $round131418 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $leagueB1314));
        $round131419 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $leagueB1314));
        $round131420 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $leagueB1314));
        $round131421 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $leagueB1314));
        $round131422 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $leagueB1314));

        //Rounds 2014/2015
        $roundA14151 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $leagueA1415));
        $roundA14152 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $leagueA1415));
        $roundA14153 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $leagueA1415));
        $roundA14154 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $leagueA1415));
        $roundA14155 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $leagueA1415));
        $roundA14156 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $leagueA1415));
        $roundA14157 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $leagueA1415));
        $roundA14158 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $leagueA1415));
        $roundA14159 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $leagueA1415));
        $roundA141510 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $leagueA1415));
        $roundA141511 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $leagueA1415));
        $roundA141512 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $leagueA1415));
        $roundA141513 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $leagueA1415));
        $roundA141514 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $leagueA1415));
        $roundA141515 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $leagueA1415));
        $roundA141516 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $leagueA1415));
        $roundA141517 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $leagueA1415));
        $roundA141518 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $leagueA1415));
        $roundA141519 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $leagueA1415));
        $roundA141520 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $leagueA1415));
        $roundA141521 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $leagueA1415));
        $roundA141522 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $leagueA1415));

        $roundB14151 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $leagueB1415));
        $roundB14152 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $leagueB1415));
        $roundB14153 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $leagueB1415));
        $roundB14154 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $leagueB1415));
        $roundB14155 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $leagueB1415));
        $roundB14156 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $leagueB1415));
        $roundB14157 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $leagueB1415));
        $roundB14158 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $leagueB1415));
        $roundB14159 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $leagueB1415));
        $roundB141510 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $leagueB1415));
        $roundB141511 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $leagueB1415));
        $roundB141512 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $leagueB1415));
        $roundB141513 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $leagueB1415));
        $roundB141514 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $leagueB1415));
        $roundB141515 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $leagueB1415));
        $roundB141516 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $leagueB1415));
        $roundB141517 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $leagueB1415));
        $roundB141518 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $leagueB1415));
        $roundB141519 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $leagueB1415));
        $roundB141520 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $leagueB1415));
        $roundB141521 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $leagueB1415));
        $roundB141522 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $leagueB1415));

        //Games 2013-2014
        $games = array(
            //Round1
            array(5,1,'14-09-2013 18:00:00',$navas,$pala,'PLAYED',$round13141),
            array(4,2,'15-09-2013 11:00:00',$monistrol,$santpedor,'PLAYED',$round13141),
            array(2,1,'14-09-2013 16:30:00',$navarcles,$marroc,'PLAYED',$round13141),
            array(1,2,'14-09-2013 18:15:00',$joanenc,$castellbell,'PLAYED',$round13141),
            array(0,3,'15-09-2013 11:00:00',$callus,$artes,'PLAYED',$round13141),
            array(0,2,'14-09-2013 18:00:00',$castellnou,$vilomara,'PLAYED',$round13141),
            //Round2
            array(3,1,'21-09-2013 18:00:00',$vilomara,$navas,'PLAYED',$round13142),
            array(2,0,'22-09-2013 11:00:00',$artes,$castellnou,'PLAYED',$round13142),
            array(3,1,'21-09-2013 18:30:00',$castellbell,$callus,'PLAYED',$round13142),
            array(0,0,'21-09-2013 16:30:00',$marroc,$joanenc,'PLAYED',$round13142),
            array(1,0,'21-09-2013 18:30:00',$santpedor,$navarcles,'PLAYED',$round13142),
            array(1,0,'21-09-2013 17:00:00',$pala,$monistrol,'PLAYED',$round13142),
            //Round3
            array(2,2,'28-09-2013 16:00:00',$navas,$monistrol,'PLAYED',$round13143),
            array(8,0,'28-09-2013 18:30:00',$navarcles,$pala,'PLAYED',$round13143),
            array(3,4,'28-09-2013 20:00:00',$joanenc,$santpedor,'PLAYED',$round13143),
            array(1,0,'29-09-2013 11:00:00',$callus,$marroc,'PLAYED',$round13143),
            array(1,4,'28-09-2013 18:30:00',$castellnou,$castellbell,'PLAYED',$round13143),
            array(3,1,'28-09-2013 16:15:00',$vilomara,$artes,'PLAYED',$round13143),
            //Round4
            array(0,5,'06-10-2013 11:00:00',$artes,$navas,'PLAYED',$round13144),
            array(3,4,'05-10-2013 16:00:00',$castellbell,$vilomara,'PLAYED',$round13144),
            array(0,3,'05-10-2013 16:00:00',$marroc,$castellnou,'PLAYED',$round13144),
            array(6,3,'05-10-2013 20:00:00',$santpedor,$callus,'PLAYED',$round13144),
            array(2,1,'06-10-2013 11:00:00',$pala,$joanenc,'PLAYED',$round13144),
            array(2,1,'06-10-2013 11:00:00',$monistrol,$navarcles,'PLAYED',$round13144),
            //Round5
            array(1,1,'12-10-2013 15:30:00',$navas,$navarcles,'PLAYED',$round13145),
            array(1,4,'12-10-2013 18:00:00',$joanenc,$monistrol,'PLAYED',$round13145),
            array(0,0,'13-10-2013 12:15:00',$callus,$pala,'PLAYED',$round13145),
            array(2,2,'12-10-2013 18:30:00',$castellnou,$santpedor,'PLAYED',$round13145),
            array(1,0,'12-10-2013 18:30:00',$vilomara,$marroc,'PLAYED',$round13145),
            array(2,4,'13-10-2013 11:00:00',$artes,$castellbell,'PLAYED',$round13145),
            //Round6
            array(3,0,'19-10-2013 18:30:00',$castellbell,$navas,'PLAYED',$round13146),
            array(2,4,'19-10-2013 16:00:00',$marroc,$artes,'PLAYED',$round13146),
            array(4,0,'19-10-2013 17:00:00',$vilomara,$santpedor,'PLAYED',$round13146),
            array(1,0,'19-10-2013 17:00:00',$pala,$castellnou,'PLAYED',$round13146),
            array(2,1,'20-10-2013 11:00:00',$monistrol,$callus,'PLAYED',$round13146),
            array(2,2,'19-10-2013 18:30:00',$navarcles,$joanenc,'PLAYED',$round13146),
            //Round7
            array(7,0,'26-10-2013 16:00:00',$navas,$joanenc,'PLAYED',$round13147),
            array(0,1,'27-10-2013 12:15:00',$callus,$navarcles,'PLAYED',$round13147),
            array(1,1,'27-10-2013 09:30:00',$castellnou,$monistrol,'PLAYED',$round13147),
            array(4,1,'27-10-2013 10:00:00',$vilomara,$pala,'PLAYED',$round13147),
            array(3,3,'27-10-2013 11:00:00',$artes,$santpedor,'PLAYED',$round13147),
            array(6,1,'27-10-2013 12:00:00',$castellbell,$marroc,'PLAYED',$round13147),
            //Round8
            array(1,2,'09-11-2013 16:00:00',$marroc,$navas,'PLAYED',$round13148),
            array(0,8,'09-11-2013 20:15:00',$santpedor,$castellbell,'PLAYED',$round13148),
            array(0,9,'09-11-2013 15:30:00',$pala,$artes,'PLAYED',$round13148),
            array(2,3,'10-11-2013 11:00:00',$monistrol,$vilomara,'PLAYED',$round13148),
            array(3,2,'10-11-2013 12:00:00',$navarcles,$castellnou,'PLAYED',$round13148),
            array(0,2,'09-11-2013 18:00:00',$joanenc,$callus,'PLAYED',$round13148),
            //Round9
            array(6,0,'16-11-2013 16:00:00',$navas,$callus,'PLAYED',$round13149),
            array(7,0,'04-01-2014 16:30:00',$castellnou,$joanenc,'PLAYED',$round13149),
            array(5,2,'16-11-2013 16:30:00',$vilomara,$navarcles,'PLAYED',$round13149),
            array(0,0,'17-11-2013 11:00:00',$artes,$monistrol,'PLAYED',$round13149),
            array(3,0,'16-11-2013 16:00:00',$castellbell,$pala,'PLAYED',$round13149),
            array(1,4,'16-11-2013 16:00:00',$marroc,$santpedor,'PLAYED',$round13149),
            //Round10
            array(5,0,'23-11-2013 16:00:00',$navas,$santpedor,'PLAYED',$round131410),
            array(2,7,'24-11-2013 11:00:00',$pala,$marroc,'PLAYED',$round131410),
            array(0,7,'24-11-2013 11:00:00',$monistrol,$castellbell,'PLAYED',$round131410),
            array(6,3,'24-11-2013 11:30:00',$navarcles,$artes,'PLAYED',$round131410),
            array(0,7,'23-11-2013 18:15:00',$joanenc,$vilomara,'PLAYED',$round131410),
            array(1,0,'24-11-2013 12:15:00',$callus,$castellnou,'PLAYED',$round131410),
            //Round11
            array(0,3,'30-11-2013 16:30:00',$castellnou,$navas,'PLAYED',$round131411),
            array(6,0,'30-11-2013 16:30:00',$vilomara,$callus,'PLAYED',$round131411),
            array(5,1,'01-12-2013 11:00:00',$artes,$joanenc,'PLAYED',$round131411),
            array(4,3,'04-01-2013 16:00:00',$castellbell,$navarcles,'PLAYED',$round131411),
            array(5,2,'30-11-2013 16:00:00',$marroc,$monistrol,'PLAYED',$round131411),
            array(3,0,'30-11-2013 18:30:00',$santpedor,$pala,'PLAYED',$round131411),
            //Round12
            array(1,3,'14-12-2013 15:30:00',$pala,$navas,'PLAYED',$round131412),
            array(2,1,'14-12-2013 18:30:00',$santpedor,$monistrol,'PLAYED',$round131412),
            array(1,3,'14-12-2013 16:00:00',$marroc,$navarcles,'PLAYED',$round131412),
            array(4,0,'15-12-2013 11:00:00',$castellbell,$joanenc,'PLAYED',$round131412),
            array(1,1,'15-12-2013 11:00:00',$artes,$callus,'PLAYED',$round131412),
            array(2,2,'14-12-2013 18:15:00',$vilomara,$castellnou,'PLAYED',$round131412),
            //Round13
            array(1,3,'21-12-2013 19:00:00',$navas,$vilomara,'PLAYED',$round131413),
            array(3,2,'21-12-2013 16:30:00',$castellnou,$artes,'PLAYED',$round131413),
            array(0,2,'22-12-2013 12:15:00',$callus,$castellbell,'PLAYED',$round131413),
            array(1,4,'21-12-2013 18:15:00',$joanenc,$marroc,'PLAYED',$round131413),
            array(5,2,'22-12-2013 11:30:00',$navarcles,$santpedor,'PLAYED',$round131413),
            array(2,2,'22-12-2013 11:00:00',$monistrol,$pala,'PLAYED',$round131413),
            //Round14
            array(1,4,'29-12-2013 11:00:00',$monistrol,$navas,'PLAYED',$round131414),
            array(2,2,'29-12-2013 11:00:00',$pala,$navarcles,'PLAYED',$round131414),
            array(4,1,'28-12-2013 16:30:00',$santpedor,$joanenc,'PLAYED',$round131414),
            array(1,2,'28-12-2013 16:00:00',$marroc,$callus,'PLAYED',$round131414),
            array(4,0,'28-12-2013 16:00:00',$castellbell,$castellnou,'PLAYED',$round131414),
            array(0,5,'29-12-2013 11:00:00',$artes,$vilomara,'PLAYED',$round131414),
            //Round15
            array(1,2,'11-01-2014 18:00:00',$navas,$artes,'PLAYED',$round131415),
            array(1,5,'11-01-2014 18:30:00',$vilomara,$castellbell,'PLAYED',$round131415),
            array(0,2,'11-01-2014 16:30:00',$castellnou,$marroc,'PLAYED',$round131415),
            array(0,0,'12-01-2014 12:15:00',$callus,$santpedor,'PLAYED',$round131415),
            array(1,1,'11-01-2014 18:15:00',$joanenc,$pala,'PLAYED',$round131415),
            array(5,1,'12-01-2014 10:30:00',$navarcles,$monistrol,'PLAYED',$round131415),
            //Round16
            array(2,3,'19-01-2014 11:30:00',$navarcles,$navas,'PLAYED',$round131416),
            array(2,0,'19-01-2014 11:00:00',$monistrol,$joanenc,'PLAYED',$round131416),
            array(4,1,'09-03-2014 11:00:00',$pala,$callus,'PLAYED',$round131416),
            array(4,0,'18-01-2014 18:30:00',$santpedor,$castellnou,'PLAYED',$round131416),
            array(0,3,'18-01-2014 16:00:00',$marroc,$vilomara,'PLAYED',$round131416),
            array(4,1,'18-01-2014 18:30:00',$castellbell,$artes,'PLAYED',$round131416),
            //Round17
            array(2,3,'25-01-2014 20:00:00',$navas,$castellbell,'PLAYED',$round131417),
            array(4,2,'26-01-2014 11:00:00',$artes,$marroc,'PLAYED',$round131417),
            array(4,1,'25-01-2014 20:30:00',$vilomara,$santpedor,'PLAYED',$round131417),
            array(7,1,'25-01-2014 18:30:00',$castellnou,$pala,'PLAYED',$round131417),
            array(3,3,'26-01-2014 12:15:00',$joanenc,$navarcles,'PLAYED',$round131417),
            array(2,1,'25-01-2014 18:15:00',$callus,$monistrol,'PLAYED',$round131417),
            //Round18
            array(0,3,'01-02-2014 18:15:00',$joanenc,$navas,'PLAYED',$round131418),
            array(5,1,'02-02-2014 11:00:00',$navarcles,$callus,'PLAYED',$round131418),
            array(1,2,'02-02-2014 11:00:00',$monistrol,$castellnou,'PLAYED',$round131418),
            array(2,6,'01-02-2014 15:30:00',$pala,$vilomara,'PLAYED',$round131418),
            array(4,3,'01-02-2014 20:30:00',$santpedor,$artes,'PLAYED',$round131418),
            array(1,2,'02-02-2014 11:00:00',$marroc,$castellbell,'PLAYED',$round131418),
            //Round19
            array(6,2,'08-02-2014 16:00:00',$navas,$marroc,'PLAYED',$round131419),
            array(4,1,'08-02-2014 16:00:00',$castellbell,$santpedor,'PLAYED',$round131419),
            array(1,2,'09-02-2014 11:00:00',$vilomara,$monistrol,'PLAYED',$round131419),
            array(6,0,'08-02-2014 18:30:00',$artes,$pala,'PLAYED',$round131419),
            array(0,3,'08-02-2014 18:30:00',$castellnou,$navarcles,'PLAYED',$round131419),
            array(2,1,'09-02-2014 12:15:00',$callus,$joanenc,'PLAYED',$round131419),
            //Round20
            array(0,1,'16-02-2014 12:15:00',$callus,$navas,'PLAYED',$round131420),
            array(1,1,'15-02-2014 18:15:00',$joanenc,$castellnou,'PLAYED',$round131420),
            array(6,5,'16-02-2014 12:15:00',$navarcles,$vilomara,'PLAYED',$round131420),
            array(5,2,'02-03-2014 11:00:00',$pala,$castellbell,'PLAYED',$round131420),
            array(0,0,'16-02-2014 11:00:00',$monistrol,$artes,'PLAYED',$round131420),
            array(2,1,'15-02-2014 20:00:00',$santpedor,$marroc,'PLAYED',$round131420),
            //Round21
            array(1,1,'22-02-2014 16:30:00',$castellnou,$callus,'PLAYED',$round131421),
            array(0,5,'22-02-2014 20:00:00',$santpedor,$navas,'PLAYED',$round131421),
            array(4,0,'22-02-2014 16:00:00',$marroc,$pala,'PLAYED',$round131421),
            array(4,0,'22-02-2014 16:00:00',$castellbell,$monistrol,'PLAYED',$round131421),
            array(3,2,'23-02-2014 11:00:00',$artes,$navarcles,'PLAYED',$round131421),
            array(4,1,'22-02-2014 18:30:00',$vilomara,$joanenc,'PLAYED',$round131421),
            //Round22
            array(5,1,'15-03-2014 18:00:00',$navas,$castellnou,'PLAYED',$round131422),
            array(0,1,'16-03-2014 12:15:00',$callus,$vilomara,'PLAYED',$round131422),
            array(0,4,'15-03-2014 18:15:00',$joanenc,$artes,'PLAYED',$round131422),
            array(3,6,'16-03-2014 10:30:00',$navarcles,$castellbell,'PLAYED',$round131422),
            array(3,3,'16-03-2014 11:00:00',$monistrol,$marroc,'PLAYED',$round131422),
            array(1,6,'15-03-2014 16:00:00',$pala,$santpedor,'PLAYED',$round131422),
            //Round1 2014-2015
            array(0,0,'21-09-2014 11:00:00',$america,$atcastellbell,'SCHEDULED',$roundB14151),
            array(0,0,'21-09-2014 11:00:00',$guardiolenca,$udbalsareny,'SCHEDULED',$roundB14151),
            array(0,0,'20-09-2014 18:00:00',$navas,$solsona,'SCHEDULED',$roundB14151),
            array(0,0,'20-09-2014 16:30:00',$avinyo,$castellnou,'SCHEDULED',$roundB14151),
            array(0,0,'21-09-2014 11:00:00',$monistrol,$atgironella,'SCHEDULED',$roundB14151),
            array(0,0,'21-09-2014 11:00:00',$navarcles,$pirinaica,'SCHEDULED',$roundB14151),
            array(0,0,'20-09-2014 19:00:00',$castellgali,$balsareny,'SCHEDULED',$roundA14151),
            array(0,0,'20-09-2014 19:00:00',$santpedor,$castellet,'SCHEDULED',$roundA14151),
            array(0,0,'21-09-2014 11:00:00',$lacoromina,$berga,'SCHEDULED',$roundA14151),
            array(0,0,'21-09-2014 11:00:00',$minorisa,$marroc,'SCHEDULED',$roundA14151),
            array(0,3,'20-09-2014 00:00:00',$castellbell,$sallent,'PLAYED',$roundA14151),
            array(0,0,'20-09-2014 20:00:00',$joanenc,$lasalle,'SCHEDULED',$roundA14151)
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
        $league->setName('Lliga intercomarcal de veterans');
        $league->setDivision('GRUP B');
        $league->setSeason('Temporada 2013/2014');
        $league->setDateBegin(date_create_from_format('d-m-Y','01-09-2013'));
        $league->setDateEnd(date_create_from_format('d-m-Y','30-06-2014'));
        $manager->persist($league);

        $league = new League();
        $league->setName('Lliga intercomarcal de veterans');
        $league->setDivision('GRUP A');
        $league->setSeason('Temporada 2014/2015');
        $league->setDateBegin(date_create_from_format('d-m-Y','20-09-2014'));
        $league->setDateEnd(date_create_from_format('d-m-Y','31-05-2015'));
        $manager->persist($league);

        $league = new League();
        $league->setName('Lliga intercomarcal de veterans');
        $league->setDivision('GRUP B');
        $league->setSeason('Temporada 2014/2015');
        $league->setDateBegin(date_create_from_format('d-m-Y','20-09-2014'));
        $league->setDateEnd(date_create_from_format('d-m-Y','31-05-2015'));
        $manager->persist($league);

    }

    public function createRounds(ObjectManager $manager)
    {

        $leagueB1314 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans', 
                            'division' => 'GRUP B',
                            'season' => 'Temporada 2013/2014'));

        $leagueA1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans', 
                            'division' => 'GRUP A',
                            'season' => 'Temporada 2014/2015'));

        $leagueB1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans', 
                            'division' => 'GRUP B',
                            'season' => 'Temporada 2014/2015'));

        $rounds = array(
            array('Jornada1','1',$leagueB1314, false),
            array('Jornada2','2',$leagueB1314, false),
            array('Jornada3','3',$leagueB1314, false),
            array('Jornada4','4',$leagueB1314, false),
            array('Jornada5','5',$leagueB1314, false),
            array('Jornada6','6',$leagueB1314, false),
            array('Jornada7','7',$leagueB1314, false),
            array('Jornada8','8',$leagueB1314, false),
            array('Jornada9','9',$leagueB1314, false),
            array('Jornada10','10',$leagueB1314, false),
            array('Jornada11','11',$leagueB1314, false),
            array('Jornada12','12',$leagueB1314, false),
            array('Jornada13','13',$leagueB1314, false),
            array('Jornada14','14',$leagueB1314, false),
            array('Jornada15','15',$leagueB1314, false),
            array('Jornada16','16',$leagueB1314, false),
            array('Jornada17','17',$leagueB1314, false),
            array('Jornada18','18',$leagueB1314, false),
            array('Jornada19','19',$leagueB1314, false),
            array('Jornada20','20',$leagueB1314, false),
            array('Jornada21','21',$leagueB1314, false),
            array('Jornada22','22',$leagueB1314, false),
            array('Jornada1','1',$leagueA1415, false),
            array('Jornada2','2',$leagueA1415, false),
            array('Jornada3','3',$leagueA1415, false),
            array('Jornada4','4',$leagueA1415, false),
            array('Jornada5','5',$leagueA1415, false),
            array('Jornada6','6',$leagueA1415, false),
            array('Jornada7','7',$leagueA1415, false),
            array('Jornada8','8',$leagueA1415, false),
            array('Jornada9','9',$leagueA1415, false),
            array('Jornada10','10',$leagueA1415, false),
            array('Jornada11','11',$leagueA1415, false),
            array('Jornada12','12',$leagueA1415, false),
            array('Jornada13','13',$leagueA1415, false),
            array('Jornada14','14',$leagueA1415, false),
            array('Jornada15','15',$leagueA1415, false),
            array('Jornada16','16',$leagueA1415, false),
            array('Jornada17','17',$leagueA1415, false),
            array('Jornada18','18',$leagueA1415, false),
            array('Jornada19','19',$leagueA1415, false),
            array('Jornada20','20',$leagueA1415, false),
            array('Jornada21','21',$leagueA1415, false),
            array('Jornada22','22',$leagueA1415, false),
            array('Jornada1','1',$leagueB1415, false),
            array('Jornada2','2',$leagueB1415, false),
            array('Jornada3','3',$leagueB1415, false),
            array('Jornada4','4',$leagueB1415, false),
            array('Jornada5','5',$leagueB1415, false),
            array('Jornada6','6',$leagueB1415, false),
            array('Jornada7','7',$leagueB1415, false),
            array('Jornada8','8',$leagueB1415, false),
            array('Jornada9','9',$leagueB1415, false),
            array('Jornada10','10',$leagueB1415, false),
            array('Jornada11','11',$leagueB1415, false),
            array('Jornada12','12',$leagueB1415, false),
            array('Jornada13','13',$leagueB1415, false),
            array('Jornada14','14',$leagueB1415, false),
            array('Jornada15','15',$leagueB1415, false),
            array('Jornada16','16',$leagueB1415, false),
            array('Jornada17','17',$leagueB1415, false),
            array('Jornada18','18',$leagueB1415, false),
            array('Jornada19','19',$leagueB1415, false),
            array('Jornada20','20',$leagueB1415, false),
            array('Jornada21','21',$leagueB1415, false),
            array('Jornada22','22',$leagueB1415, false)
        );

        foreach ($rounds as $round_fixture) {
            $round = new Round();
            $round->setName($round_fixture[0]);
            $round->setOrdernum($round_fixture[1]);
            $round = $round->setLeague($round_fixture[2]); 
            $round->setRoundplayed($round_fixture[3]); 
            $manager->persist($round);
        }
    }
}