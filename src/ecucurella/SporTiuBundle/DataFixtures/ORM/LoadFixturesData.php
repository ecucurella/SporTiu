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

    private $castellnou;
    private $monistrol;
    private $callus;
    private $navas;
    private $marroc;
    private $castellbell;
    private $santpedor;
    private $vilomara;
    private $artes;
    private $pala;
    private $navarcles;
    private $joanenc;
    private $america;
    private $atcastellbell;
    private $guardiolenca;
    private $udbalsareny;
    private $solsona;
    private $avinyo;
    private $atgironella;
    private $pirinaica;
    private $castellgali;
    private $balsareny;
    private $castellet;
    private $lacoromina;
    private $berga;
    private $minorisa;
    private $sallent;
    private $lasalle;
    private $olesa;
    private $pradenc;
    private $xup;
    private $verdiblanca;
    private $calrosal;
    private $suria;
    private $fruitosenc;
    private $puigreig;

    private $leagueB1314;
    private $leagueA1415;
    private $leagueB1415;
    private $leagueC1415;

    private $round13141;
    private $round13142;
    private $round13143;
    private $round13144;
    private $round13145;
    private $round13146;
    private $round13147;
    private $round13148;
    private $round13149;
    private $round131410;
    private $round131411;
    private $round131412;
    private $round131413;
    private $round131414;
    private $round131415;
    private $round131416;
    private $round131417;
    private $round131418;
    private $round131419;
    private $round131420;
    private $round131421;
    private $round131422;
    private $roundA14151;
    private $roundA14152;
    private $roundA14153;
    private $roundA14154;
    private $roundA14155;
    private $roundA14156;
    private $roundA14157;
    private $roundA14158;
    private $roundA14159;
    private $roundA141510;
    private $roundA141511;
    private $roundA141512;
    private $roundA141513;
    private $roundA141514;
    private $roundA141515;
    private $roundA141516;
    private $roundA141517;
    private $roundA141518;
    private $roundA141519;
    private $roundA141520;
    private $roundA141521;
    private $roundA141522;
    private $roundB14151;
    private $roundB14152;
    private $roundB14153;
    private $roundB14154;
    private $roundB14155;
    private $roundB14156;
    private $roundB14157;
    private $roundB14158;
    private $roundB14159;
    private $roundB141510;
    private $roundB141511;
    private $roundB141512;
    private $roundB141513;
    private $roundB141514;
    private $roundB141515;
    private $roundB141516;
    private $roundB141517;
    private $roundB141518;
    private $roundB141519;
    private $roundB141520;
    private $roundB141521;
    private $roundB141522;
    private $roundC14151;
    private $roundC14152;
    private $roundC14153;
    private $roundC14154;
    private $roundC14155;
    private $roundC14156;
    private $roundC14157;
    private $roundC14158;
    private $roundC14159;
    private $roundC141510;
    private $roundC141511;
    private $roundC141512;
    private $roundC141513;
    private $roundC141514;
    private $roundC141515;
    private $roundC141516;
    private $roundC141517;
    private $roundC141518;
    private $roundC141519;
    private $roundC141520;
    private $roundC141521;
    private $roundC141522;

    private function getClubs(ObjectManager $manager) {
        //Clubs
        $this->castellnou = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'U.E. Castellnou'));
        $this->monistrol = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.V.F. Monistrol'));
        $this->callus = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Callús'));
        $this->navas = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Navàs'));
        $this->marroc = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'ADP. Marroc'));
        $this->castellbell = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Castellbell i Vilar'));
        $this->santpedor = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Santpedor'));
        $this->vilomara = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Vilomara'));
        $this->artes = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Artés'));
        $this->pala = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'A.V. Ceip Joan de Palà'));
        $this->navarcles = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Navarcles'));
        $this->joanenc = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Joanenc'));  
        $this->america = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Club Amèrica'));  
        $this->atcastellbell = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'AT. Castellbell'));  
        $this->guardiolenca = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Guardiolenca C.F.'));  
        $this->udbalsareny = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'U.D. Balsareny'));  
        $this->solsona = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Solsona'));  
        $this->avinyo = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Avinyó'));  
        $this->atgironella = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. AT. Gironella'));  
        $this->pirinaica = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Pirinaica'));  
        $this->castellgali = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Castellgalí'));  
        $this->balsareny = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Balsareny'));  
        $this->castellet = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Castellet'));  
        $this->lacoromina = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.D. La Coromina'));  
        $this->berga = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Berga'));  
        $this->minorisa = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Minorisa La Font'));  
        $this->sallent = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Sallent'));  
        $this->lasalle = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'La Salle Manresa'));  
        $this->olesa = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Olesa'));  
        $this->pradenc = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Pradenc'));  
        $this->xup = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.F. Pare Ignasi Puig'));  
        $this->verdiblanca = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Verdiblanca'));  
        $this->calrosal = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'Cal Rosal'));  
        $this->suria = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Súria'));  
        $this->fruitosenc = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'F.C. Fruitosenc'));  
        $this->puigreig = $manager->getRepository('ecucurellaSporTiuBundle:Club')
          ->findOneBy(array('name' => 'C.E. Puigreig'));  
    }

    private function getLeagues(ObjectManager $manager) {
        //League 2013/2014
        $this->leagueB1314 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP B',
                            'season' => 'Temporada 2013/2014'));
        //League 2014/2015
        $this->leagueA1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP A',
                            'season' => 'Temporada 2014/2015'));
        
        $this->leagueB1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP B',
                            'season' => 'Temporada 2014/2015'));

        $this->leagueC1415 = $manager->getRepository('ecucurellaSporTiuBundle:League')
          ->findOneBy(array('name' => 'Lliga intercomarcal de veterans',
                            'division' => 'GRUP C',
                            'season' => 'Temporada 2014/2015'));
    }

    private function getRounds(ObjectManager $manager) {

        $this->round13141 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $this->leagueB1314));
        $this->round13142 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $this->leagueB1314));
        $this->round13143 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $this->leagueB1314));
        $this->round13144 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $this->leagueB1314));
        $this->round13145 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $this->leagueB1314));
        $this->round13146 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $this->leagueB1314));
        $this->round13147 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $this->leagueB1314));
        $this->round13148 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $this->leagueB1314));
        $this->round13149 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $this->leagueB1314));
        $this->round131410 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $this->leagueB1314));
        $this->round131411 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $this->leagueB1314));
        $this->round131412 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $this->leagueB1314));
        $this->round131413 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $this->leagueB1314));
        $this->round131414 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $this->leagueB1314));
        $this->round131415 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $this->leagueB1314));
        $this->round131416 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $this->leagueB1314));
        $this->round131417 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $this->leagueB1314));
        $this->round131418 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $this->leagueB1314));
        $this->round131419 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $this->leagueB1314));
        $this->round131420 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $this->leagueB1314));
        $this->round131421 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $this->leagueB1314));
        $this->round131422 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $this->leagueB1314));

        $this->roundA14151 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $this->leagueA1415));
        $this->roundA14152 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $this->leagueA1415));
        $this->roundA14153 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $this->leagueA1415));
        $this->roundA14154 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $this->leagueA1415));
        $this->roundA14155 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $this->leagueA1415));
        $this->roundA14156 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $this->leagueA1415));
        $this->roundA14157 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $this->leagueA1415));
        $this->roundA14158 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $this->leagueA1415));
        $this->roundA14159 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $this->leagueA1415));
        $this->roundA141510 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $this->leagueA1415));
        $this->roundA141511 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $this->leagueA1415));
        $this->roundA141512 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $this->leagueA1415));
        $this->roundA141513 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $this->leagueA1415));
        $this->roundA141514 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $this->leagueA1415));
        $this->roundA141515 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $this->leagueA1415));
        $this->roundA141516 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $this->leagueA1415));
        $this->roundA141517 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $this->leagueA1415));
        $this->roundA141518 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $this->leagueA1415));
        $this->roundA141519 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $this->leagueA1415));
        $this->roundA141520 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $this->leagueA1415));
        $this->roundA141521 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $this->leagueA1415));
        $this->roundA141522 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $this->leagueA1415));

        $this->roundB14151 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $this->leagueB1415));
        $this->roundB14152 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $this->leagueB1415));
        $this->roundB14153 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $this->leagueB1415));
        $this->roundB14154 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $this->leagueB1415));
        $this->roundB14155 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $this->leagueB1415));
        $this->roundB14156 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $this->leagueB1415));
        $this->roundB14157 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $this->leagueB1415));
        $this->roundB14158 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $this->leagueB1415));
        $this->roundB14159 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $this->leagueB1415));
        $this->roundB141510 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $this->leagueB1415));
        $this->roundB141511 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $this->leagueB1415));
        $this->roundB141512 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $this->leagueB1415));
        $this->roundB141513 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $this->leagueB1415));
        $this->roundB141514 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $this->leagueB1415));
        $this->roundB141515 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $this->leagueB1415));
        $this->roundB141516 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $this->leagueB1415));
        $this->roundB141517 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $this->leagueB1415));
        $this->roundB141518 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $this->leagueB1415));
        $this->roundB141519 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $this->leagueB1415));
        $this->roundB141520 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $this->leagueB1415));
        $this->roundB141521 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $this->leagueB1415));
        $this->roundB141522 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $this->leagueB1415));

        $this->roundC14151 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada1', 'league' => $this->leagueC1415));
        $this->roundC14152 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada2', 'league' => $this->leagueC1415));
        $this->roundC14153 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada3', 'league' => $this->leagueC1415));
        $this->roundC14154 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada4', 'league' => $this->leagueC1415));
        $this->roundC14155 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada5', 'league' => $this->leagueC1415));
        $this->roundC14156 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada6', 'league' => $this->leagueC1415));
        $this->roundC14157 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada7', 'league' => $this->leagueC1415));
        $this->roundC14158 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada8', 'league' => $this->leagueC1415));
        $this->roundC14159 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada9', 'league' => $this->leagueC1415));
        $this->roundC141510 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada10', 'league' => $this->leagueC1415));
        $this->roundC141511 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada11', 'league' => $this->leagueC1415));
        $this->roundC141512 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada12', 'league' => $this->leagueC1415));
        $this->roundC141513 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada13', 'league' => $this->leagueC1415));
        $this->roundC141514 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada14', 'league' => $this->leagueC1415));
        $this->roundC141515 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada15', 'league' => $this->leagueC1415));
        $this->roundC141516 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada16', 'league' => $this->leagueC1415));
        $this->roundC141517 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada17', 'league' => $this->leagueC1415));
        $this->roundC141518 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada18', 'league' => $this->leagueC1415));
        $this->roundC141519 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada19', 'league' => $this->leagueC1415));
        $this->roundC141520 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada20', 'league' => $this->leagueC1415));
        $this->roundC141521 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada21', 'league' => $this->leagueC1415));
        $this->roundC141522 = $manager->getRepository('ecucurellaSporTiuBundle:Round')
        ->findOneBy(array('name' => 'Jornada22', 'league' => $this->leagueC1415));
    }

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
        $this->addClubsToLeagues($manager);
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
            array('ADP. Marroc','MARROC','','bundles/ecucurellasportiu/images/generic.jpg','Samarreta, pantalons i mitges vermelles','Samarreta, pantalons i mitges verdes',
              'veterans.marroc@yahoo.es',''),
            array('C.E. Castellbell i Vilar','CASTELLBELL','','bundles/ecucurellasportiu/images/castellbell.png',
              'Samarreta, pantalons i mitges negres','','sebibach@hotmail.es',''),
            array('C.F. Santpedor','SANTPEDOR','1915','bundles/ecucurellasportiu/images/santpedor.jpeg',
              'Samarreta blaugrana, pantalons blau marí i mitges blaugrana','','veteranscfsantpedor@gmail.com',
              'http://www.cfsantpedor.es'),
            array('C.F. Vilomara','VILOMARA','','bundles/ecucurellasportiu/images/vilomara.jpg',
              'Samarreta verd i blanca, pantalons blancs i mitges verdes','','luisgonzalez15@gmail.com',''),
            array('F.C. Artés','ARTÉS','','bundles/ecucurellasportiu/images/artes.jpeg',
              'Samarreta vermella, pantalons negres i mitges vermelles','','','http://www.fcartes.com'),
            array('A.V. Ceip Joan de Palà','JOAN DE PALÀ','','bundles/ecucurellasportiu/images/pala.jpeg'
              ,'','','avceipjoandepala@gmail.com',''),
            array('C.F. Navarcles','NAVARCLES','','bundles/ecucurellasportiu/images/navarcles.png',
              'Samarreta, pantalons i mitges blaves','','',''),
            array('F.C. Joanenc','SANT JOAN','','bundles/ecucurellasportiu/images/joanenc.jpeg',
              'Samarreta groga, pantalons blaus i mitges grogues','','jlsr15468@gmail.com',''),
            array('Club Amèrica','AMERICA','','bundles/ecucurellasportiu/images/america.png',
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
              'Samarreta blanca i vermella, pantalons vermells i mitges blanques i vermelles','','',''),
            array('C.F. Olesa','OLESA','','bundles/ecucurellasportiu/images/olesa.jpg',
              'Samarreta, pantalons i mitges negres','','',''),
            array('F.C. Pradenc','PRADENC','','bundles/ecucurellasportiu/images/pradenc.jpeg',
              'Samarreta blaugrana, pantalons i mitges blaves','','',''),
            array('C.F. Pare Ignasi Puig','EL XUP','1966','bundles/ecucurellasportiu/images/xup.jpg',
              'Samarreta blanca i blava, pantalons i mitges blaves','','',''),
            array('Verdiblanca','VERDIBLANCA','','bundles/ecucurellasportiu/images/generic.jpg',
              'Samarreta verda i blanca, pantalons verds i mitges blanques','','',''),
            array('Cal Rosal','CAL ROSAL','','bundles/ecucurellasportiu/images/calrosal.jpeg',
              'Samarreta groga, pantalons negres','','',''),
            array('C.E. Súria','SÚRIA','1911','bundles/ecucurellasportiu/images/suria.png',
              'Samarreta negre i blanca, pantalons i mitges negres',
              'Samarreta vermella, pantalons blancs i mitges vermelles',
              '','http://www.cdesuria.com'),
            array('F.C. Fruitosenc','FRUITOSENC','','bundles/ecucurellasportiu/images/fruitosenc.jpeg',
              'Samarreta negre i vermella, pantalons negres','','','http://www.fruitosenc.cat'),
            array('C.E. Puigreig','PUIGREIG','1916','bundles/ecucurellasportiu/images/puigreig.jpeg',
              'Samarreta verda amb franja vermella, pantalons vermells i mitges verdes',
              'Samarreta, pantalons i mitges negres',
              '','http://www.cepuig-reig.cat')
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
        
        $this->getClubs($manager);
        $this->getLeagues($manager);
        $this->getRounds($manager);

        //Games 2013-2014
        $games = array(
            //Round1
            array(5,1,'14-09-2013 18:00:00',$this->navas,$this->pala,'PLAYED',$this->round13141),
            array(4,2,'15-09-2013 11:00:00',$this->monistrol,$this->santpedor,'PLAYED',$this->round13141),
            array(2,1,'14-09-2013 16:30:00',$this->navarcles,$this->marroc,'PLAYED',$this->round13141),
            array(1,2,'14-09-2013 18:15:00',$this->joanenc,$this->castellbell,'PLAYED',$this->round13141),
            array(0,3,'15-09-2013 11:00:00',$this->callus,$this->artes,'PLAYED',$this->round13141),
            array(0,2,'14-09-2013 18:00:00',$this->castellnou,$this->vilomara,'PLAYED',$this->round13141),
            //Round2
            array(3,1,'21-09-2013 18:00:00',$this->vilomara,$this->navas,'PLAYED',$this->round13142),
            array(2,0,'22-09-2013 11:00:00',$this->artes,$this->castellnou,'PLAYED',$this->round13142),
            array(3,1,'21-09-2013 18:30:00',$this->castellbell,$this->callus,'PLAYED',$this->round13142),
            array(0,0,'21-09-2013 16:30:00',$this->marroc,$this->joanenc,'PLAYED',$this->round13142),
            array(1,0,'21-09-2013 18:30:00',$this->santpedor,$this->navarcles,'PLAYED',$this->round13142),
            array(1,0,'21-09-2013 17:00:00',$this->pala,$this->monistrol,'PLAYED',$this->round13142),
            //Round3
            array(2,2,'28-09-2013 16:00:00',$this->navas,$this->monistrol,'PLAYED',$this->round13143),
            array(8,0,'28-09-2013 18:30:00',$this->navarcles,$this->pala,'PLAYED',$this->round13143),
            array(3,4,'28-09-2013 20:00:00',$this->joanenc,$this->santpedor,'PLAYED',$this->round13143),
            array(1,0,'29-09-2013 11:00:00',$this->callus,$this->marroc,'PLAYED',$this->round13143),
            array(1,4,'28-09-2013 18:30:00',$this->castellnou,$this->castellbell,'PLAYED',$this->round13143),
            array(3,1,'28-09-2013 16:15:00',$this->vilomara,$this->artes,'PLAYED',$this->round13143),
            //Round4
            array(0,5,'06-10-2013 11:00:00',$this->artes,$this->navas,'PLAYED',$this->round13144),
            array(3,4,'05-10-2013 16:00:00',$this->castellbell,$this->vilomara,'PLAYED',$this->round13144),
            array(0,3,'05-10-2013 16:00:00',$this->marroc,$this->castellnou,'PLAYED',$this->round13144),
            array(6,3,'05-10-2013 20:00:00',$this->santpedor,$this->callus,'PLAYED',$this->round13144),
            array(2,1,'06-10-2013 11:00:00',$this->pala,$this->joanenc,'PLAYED',$this->round13144),
            array(2,1,'06-10-2013 11:00:00',$this->monistrol,$this->navarcles,'PLAYED',$this->round13144),
            //Round5
            array(1,1,'12-10-2013 15:30:00',$this->navas,$this->navarcles,'PLAYED',$this->round13145),
            array(1,4,'12-10-2013 18:00:00',$this->joanenc,$this->monistrol,'PLAYED',$this->round13145),
            array(0,0,'13-10-2013 12:15:00',$this->callus,$this->pala,'PLAYED',$this->round13145),
            array(2,2,'12-10-2013 18:30:00',$this->castellnou,$this->santpedor,'PLAYED',$this->round13145),
            array(1,0,'12-10-2013 18:30:00',$this->vilomara,$this->marroc,'PLAYED',$this->round13145),
            array(2,4,'13-10-2013 11:00:00',$this->artes,$this->castellbell,'PLAYED',$this->round13145),
            //Round6
            array(3,0,'19-10-2013 18:30:00',$this->castellbell,$this->navas,'PLAYED',$this->round13146),
            array(2,4,'19-10-2013 16:00:00',$this->marroc,$this->artes,'PLAYED',$this->round13146),
            array(4,0,'19-10-2013 17:00:00',$this->vilomara,$this->santpedor,'PLAYED',$this->round13146),
            array(1,0,'19-10-2013 17:00:00',$this->pala,$this->castellnou,'PLAYED',$this->round13146),
            array(2,1,'20-10-2013 11:00:00',$this->monistrol,$this->callus,'PLAYED',$this->round13146),
            array(2,2,'19-10-2013 18:30:00',$this->navarcles,$this->joanenc,'PLAYED',$this->round13146),
            //Round7
            array(7,0,'26-10-2013 16:00:00',$this->navas,$this->joanenc,'PLAYED',$this->round13147),
            array(0,1,'27-10-2013 12:15:00',$this->callus,$this->navarcles,'PLAYED',$this->round13147),
            array(1,1,'27-10-2013 09:30:00',$this->castellnou,$this->monistrol,'PLAYED',$this->round13147),
            array(4,1,'27-10-2013 10:00:00',$this->vilomara,$this->pala,'PLAYED',$this->round13147),
            array(3,3,'27-10-2013 11:00:00',$this->artes,$this->santpedor,'PLAYED',$this->round13147),
            array(6,1,'27-10-2013 12:00:00',$this->castellbell,$this->marroc,'PLAYED',$this->round13147),
            //Round8
            array(1,2,'09-11-2013 16:00:00',$this->marroc,$this->navas,'PLAYED',$this->round13148),
            array(0,8,'09-11-2013 20:15:00',$this->santpedor,$this->castellbell,'PLAYED',$this->round13148),
            array(0,9,'09-11-2013 15:30:00',$this->pala,$this->artes,'PLAYED',$this->round13148),
            array(2,3,'10-11-2013 11:00:00',$this->monistrol,$this->vilomara,'PLAYED',$this->round13148),
            array(3,2,'10-11-2013 12:00:00',$this->navarcles,$this->castellnou,'PLAYED',$this->round13148),
            array(0,2,'09-11-2013 18:00:00',$this->joanenc,$this->callus,'PLAYED',$this->round13148),
            //Round9
            array(6,0,'16-11-2013 16:00:00',$this->navas,$this->callus,'PLAYED',$this->round13149),
            array(7,0,'04-01-2014 16:30:00',$this->castellnou,$this->joanenc,'PLAYED',$this->round13149),
            array(5,2,'16-11-2013 16:30:00',$this->vilomara,$this->navarcles,'PLAYED',$this->round13149),
            array(0,0,'17-11-2013 11:00:00',$this->artes,$this->monistrol,'PLAYED',$this->round13149),
            array(3,0,'16-11-2013 16:00:00',$this->castellbell,$this->pala,'PLAYED',$this->round13149),
            array(1,4,'16-11-2013 16:00:00',$this->marroc,$this->santpedor,'PLAYED',$this->round13149),
            //Round10
            array(5,0,'23-11-2013 16:00:00',$this->navas,$this->santpedor,'PLAYED',$this->round131410),
            array(2,7,'24-11-2013 11:00:00',$this->pala,$this->marroc,'PLAYED',$this->round131410),
            array(0,7,'24-11-2013 11:00:00',$this->monistrol,$this->castellbell,'PLAYED',$this->round131410),
            array(6,3,'24-11-2013 11:30:00',$this->navarcles,$this->artes,'PLAYED',$this->round131410),
            array(0,7,'23-11-2013 18:15:00',$this->joanenc,$this->vilomara,'PLAYED',$this->round131410),
            array(1,0,'24-11-2013 12:15:00',$this->callus,$this->castellnou,'PLAYED',$this->round131410),
            //Round11
            array(0,3,'30-11-2013 16:30:00',$this->castellnou,$this->navas,'PLAYED',$this->round131411),
            array(6,0,'30-11-2013 16:30:00',$this->vilomara,$this->callus,'PLAYED',$this->round131411),
            array(5,1,'01-12-2013 11:00:00',$this->artes,$this->joanenc,'PLAYED',$this->round131411),
            array(4,3,'04-01-2013 16:00:00',$this->castellbell,$this->navarcles,'PLAYED',$this->round131411),
            array(5,2,'30-11-2013 16:00:00',$this->marroc,$this->monistrol,'PLAYED',$this->round131411),
            array(3,0,'30-11-2013 18:30:00',$this->santpedor,$this->pala,'PLAYED',$this->round131411),
            //Round12
            array(1,3,'14-12-2013 15:30:00',$this->pala,$this->navas,'PLAYED',$this->round131412),
            array(2,1,'14-12-2013 18:30:00',$this->santpedor,$this->monistrol,'PLAYED',$this->round131412),
            array(1,3,'14-12-2013 16:00:00',$this->marroc,$this->navarcles,'PLAYED',$this->round131412),
            array(4,0,'15-12-2013 11:00:00',$this->castellbell,$this->joanenc,'PLAYED',$this->round131412),
            array(1,1,'15-12-2013 11:00:00',$this->artes,$this->callus,'PLAYED',$this->round131412),
            array(2,2,'14-12-2013 18:15:00',$this->vilomara,$this->castellnou,'PLAYED',$this->round131412),
            //Round13
            array(1,3,'21-12-2013 19:00:00',$this->navas,$this->vilomara,'PLAYED',$this->round131413),
            array(3,2,'21-12-2013 16:30:00',$this->castellnou,$this->artes,'PLAYED',$this->round131413),
            array(0,2,'22-12-2013 12:15:00',$this->callus,$this->castellbell,'PLAYED',$this->round131413),
            array(1,4,'21-12-2013 18:15:00',$this->joanenc,$this->marroc,'PLAYED',$this->round131413),
            array(5,2,'22-12-2013 11:30:00',$this->navarcles,$this->santpedor,'PLAYED',$this->round131413),
            array(2,2,'22-12-2013 11:00:00',$this->monistrol,$this->pala,'PLAYED',$this->round131413),
            //Round14
            array(1,4,'29-12-2013 11:00:00',$this->monistrol,$this->navas,'PLAYED',$this->round131414),
            array(2,2,'29-12-2013 11:00:00',$this->pala,$this->navarcles,'PLAYED',$this->round131414),
            array(4,1,'28-12-2013 16:30:00',$this->santpedor,$this->joanenc,'PLAYED',$this->round131414),
            array(1,2,'28-12-2013 16:00:00',$this->marroc,$this->callus,'PLAYED',$this->round131414),
            array(4,0,'28-12-2013 16:00:00',$this->castellbell,$this->castellnou,'PLAYED',$this->round131414),
            array(0,5,'29-12-2013 11:00:00',$this->artes,$this->vilomara,'PLAYED',$this->round131414),
            //Round15
            array(1,2,'11-01-2014 18:00:00',$this->navas,$this->artes,'PLAYED',$this->round131415),
            array(1,5,'11-01-2014 18:30:00',$this->vilomara,$this->castellbell,'PLAYED',$this->round131415),
            array(0,2,'11-01-2014 16:30:00',$this->castellnou,$this->marroc,'PLAYED',$this->round131415),
            array(0,0,'12-01-2014 12:15:00',$this->callus,$this->santpedor,'PLAYED',$this->round131415),
            array(1,1,'11-01-2014 18:15:00',$this->joanenc,$this->pala,'PLAYED',$this->round131415),
            array(5,1,'12-01-2014 10:30:00',$this->navarcles,$this->monistrol,'PLAYED',$this->round131415),
            //Round16
            array(2,3,'19-01-2014 11:30:00',$this->navarcles,$this->navas,'PLAYED',$this->round131416),
            array(2,0,'19-01-2014 11:00:00',$this->monistrol,$this->joanenc,'PLAYED',$this->round131416),
            array(4,1,'09-03-2014 11:00:00',$this->pala,$this->callus,'PLAYED',$this->round131416),
            array(4,0,'18-01-2014 18:30:00',$this->santpedor,$this->castellnou,'PLAYED',$this->round131416),
            array(0,3,'18-01-2014 16:00:00',$this->marroc,$this->vilomara,'PLAYED',$this->round131416),
            array(4,1,'18-01-2014 18:30:00',$this->castellbell,$this->artes,'PLAYED',$this->round131416),
            //Round17
            array(2,3,'25-01-2014 20:00:00',$this->navas,$this->castellbell,'PLAYED',$this->round131417),
            array(4,2,'26-01-2014 11:00:00',$this->artes,$this->marroc,'PLAYED',$this->round131417),
            array(4,1,'25-01-2014 20:30:00',$this->vilomara,$this->santpedor,'PLAYED',$this->round131417),
            array(7,1,'25-01-2014 18:30:00',$this->castellnou,$this->pala,'PLAYED',$this->round131417),
            array(3,3,'26-01-2014 12:15:00',$this->joanenc,$this->navarcles,'PLAYED',$this->round131417),
            array(2,1,'25-01-2014 18:15:00',$this->callus,$this->monistrol,'PLAYED',$this->round131417),
            //Round18
            array(0,3,'01-02-2014 18:15:00',$this->joanenc,$this->navas,'PLAYED',$this->round131418),
            array(5,1,'02-02-2014 11:00:00',$this->navarcles,$this->callus,'PLAYED',$this->round131418),
            array(1,2,'02-02-2014 11:00:00',$this->monistrol,$this->castellnou,'PLAYED',$this->round131418),
            array(2,6,'01-02-2014 15:30:00',$this->pala,$this->vilomara,'PLAYED',$this->round131418),
            array(4,3,'01-02-2014 20:30:00',$this->santpedor,$this->artes,'PLAYED',$this->round131418),
            array(1,2,'02-02-2014 11:00:00',$this->marroc,$this->castellbell,'PLAYED',$this->round131418),
            //Round19
            array(6,2,'08-02-2014 16:00:00',$this->navas,$this->marroc,'PLAYED',$this->round131419),
            array(4,1,'08-02-2014 16:00:00',$this->castellbell,$this->santpedor,'PLAYED',$this->round131419),
            array(1,2,'09-02-2014 11:00:00',$this->vilomara,$this->monistrol,'PLAYED',$this->round131419),
            array(6,0,'08-02-2014 18:30:00',$this->artes,$this->pala,'PLAYED',$this->round131419),
            array(0,3,'08-02-2014 18:30:00',$this->castellnou,$this->navarcles,'PLAYED',$this->round131419),
            array(2,1,'09-02-2014 12:15:00',$this->callus,$this->joanenc,'PLAYED',$this->round131419),
            //Round20
            array(0,1,'16-02-2014 12:15:00',$this->callus,$this->navas,'PLAYED',$this->round131420),
            array(1,1,'15-02-2014 18:15:00',$this->joanenc,$this->castellnou,'PLAYED',$this->round131420),
            array(6,5,'16-02-2014 12:15:00',$this->navarcles,$this->vilomara,'PLAYED',$this->round131420),
            array(5,2,'02-03-2014 11:00:00',$this->pala,$this->castellbell,'PLAYED',$this->round131420),
            array(0,0,'16-02-2014 11:00:00',$this->monistrol,$this->artes,'PLAYED',$this->round131420),
            array(2,1,'15-02-2014 20:00:00',$this->santpedor,$this->marroc,'PLAYED',$this->round131420),
            //Round21
            array(1,1,'22-02-2014 16:30:00',$this->castellnou,$this->callus,'PLAYED',$this->round131421),
            array(0,5,'22-02-2014 20:00:00',$this->santpedor,$this->navas,'PLAYED',$this->round131421),
            array(4,0,'22-02-2014 16:00:00',$this->marroc,$this->pala,'PLAYED',$this->round131421),
            array(4,0,'22-02-2014 16:00:00',$this->castellbell,$this->monistrol,'PLAYED',$this->round131421),
            array(3,2,'23-02-2014 11:00:00',$this->artes,$this->navarcles,'PLAYED',$this->round131421),
            array(4,1,'22-02-2014 18:30:00',$this->vilomara,$this->joanenc,'PLAYED',$this->round131421),
            //Round22
            array(5,1,'15-03-2014 18:00:00',$this->navas,$this->castellnou,'PLAYED',$this->round131422),
            array(0,1,'16-03-2014 12:15:00',$this->callus,$this->vilomara,'PLAYED',$this->round131422),
            array(0,4,'15-03-2014 18:15:00',$this->joanenc,$this->artes,'PLAYED',$this->round131422),
            array(3,6,'16-03-2014 10:30:00',$this->navarcles,$this->castellbell,'PLAYED',$this->round131422),
            array(3,3,'16-03-2014 11:00:00',$this->monistrol,$this->marroc,'PLAYED',$this->round131422),
            array(1,6,'15-03-2014 16:00:00',$this->pala,$this->santpedor,'PLAYED',$this->round131422),
            //Round1 2014-2015
            array(0,4,'20-09-2014 19:00:00',$this->castellgali,$this->balsareny,'PLAYED',$this->roundA14151),
            array(3,4,'20-09-2014 19:00:00',$this->santpedor,$this->castellet,'PLAYED',$this->roundA14151),
            array(5,2,'21-09-2014 11:00:00',$this->lacoromina,$this->berga,'PLAYED',$this->roundA14151),
            array(4,0,'21-09-2014 11:00:00',$this->minorisa,$this->marroc,'PLAYED',$this->roundA14151),
            array(0,3,'20-09-2014 00:00:00',$this->castellbell,$this->sallent,'PLAYED',$this->roundA14151),
            array(4,2,'20-09-2014 20:00:00',$this->joanenc,$this->lasalle,'PLAYED',$this->roundA14151),
            array(3,3,'21-09-2014 11:00:00',$this->america,$this->atcastellbell,'PLAYED',$this->roundB14151),
            array(2,3,'21-09-2014 11:00:00',$this->guardiolenca,$this->udbalsareny,'PLAYED',$this->roundB14151),
            array(1,2,'20-09-2014 18:00:00',$this->navas,$this->solsona,'PLAYED',$this->roundB14151),
            array(3,2,'20-09-2014 16:30:00',$this->avinyo,$this->castellnou,'PLAYED',$this->roundB14151),
            array(1,2,'21-09-2014 11:00:00',$this->monistrol,$this->atgironella,'PLAYED',$this->roundB14151),
            array(3,2,'21-09-2014 11:00:00',$this->navarcles,$this->pirinaica,'PLAYED',$this->roundB14151),
            array(6,0,'21-09-2014 10:00:00',$this->olesa,$this->pradenc,'PLAYED',$this->roundC14151),
            array(0,3,'20-09-2014 16:00:00',$this->pala,$this->xup,'PLAYED',$this->roundC14151),
            array(1,2,'20-09-2014 16:00:00',$this->verdiblanca,$this->calrosal,'PLAYED',$this->roundC14151),
            array(8,1,'21-09-2014 11:00:00',$this->suria,$this->artes,'PLAYED',$this->roundC14151),
            array(2,1,'20-09-2014 18:15:00',$this->vilomara,$this->fruitosenc,'PLAYED',$this->roundC14151),
            array(5,0,'21-09-2014 10:00:00',$this->puigreig,$this->callus,'PLAYED',$this->roundC14151),
            
            array(1,1,'27-09-2014 16:00:00',$this->lasalle,$this->castellgali,'PLAYED',$this->roundA14152),
            array(3,0,'27-09-2014 18:00:00',$this->sallent,$this->joanenc,'PLAYED',$this->roundA14152),
            array(1,3,'28-09-2014 11:00:00',$this->marroc,$this->castellbell,'PLAYED',$this->roundA14152),
            array(0,2,'28-09-2014 10:00:00',$this->berga,$this->minorisa,'PLAYED',$this->roundA14152),
            array(5,0,'27-09-2014 19:00:00',$this->castellet,$this->lacoromina,'PLAYED',$this->roundA14152),
            array(1,2,'28-09-2014 10:00:00',$this->balsareny,$this->santpedor,'PLAYED',$this->roundA14152),
            array(6,2,'27-09-2014 18:00:00',$this->pirinaica,$this->america,'PLAYED',$this->roundB14152),
            array(1,0,'27-09-2014 18:30:00',$this->atgironella,$this->navarcles,'PLAYED',$this->roundB14152),
            array(1,4,'27-09-2014 16:30:00',$this->castellnou,$this->monistrol,'PLAYED',$this->roundB14152),
            array(5,1,'27-09-2014 20:00:00',$this->solsona,$this->avinyo,'PLAYED',$this->roundB14152),
            array(0,5,'27-09-2014 17:30:00',$this->udbalsareny,$this->navas,'PLAYED',$this->roundB14152),
            array(3,0,'27-09-2014 16:00:00',$this->atcastellbell,$this->guardiolenca,'PLAYED',$this->roundB14152),
            array(0,3,'28-09-2014 11:00:00',$this->callus,$this->olesa,'PLAYED',$this->roundC14152),
            array(2,1,'27-09-2014 18:00:00',$this->fruitosenc,$this->puigreig,'PLAYED',$this->roundC14152),
            array(1,4,'28-09-2014 10:30:00',$this->artes,$this->vilomara,'PLAYED',$this->roundC14152),
            array(1,4,'27-09-2014 17:00:00',$this->calrosal,$this->suria,'PLAYED',$this->roundC14152),
            array(3,2,'27-09-2014 17:00:00',$this->xup,$this->verdiblanca,'PLAYED',$this->roundC14152),
            array(1,3,'27-09-2014 19:00:00',$this->pradenc,$this->pala,'PLAYED',$this->roundC14152),

            array(5,3,'04-10-2014 16:30:00',$this->castellgali,$this->santpedor,'PLAYED',$this->roundA14153),
            array(1,0,'04-10-2014 17:00:00',$this->lacoromina,$this->balsareny,'PLAYED',$this->roundA14153),
            array(6,1,'05-10-2014 11:00:00',$this->minorisa,$this->castellet,'PLAYED',$this->roundA14153),
            array(4,2,'04-10-2014 16:00:00',$this->castellbell,$this->berga,'PLAYED',$this->roundA14153),
            array(1,2,'01-11-2014 20:00:00',$this->joanenc,$this->marroc,'PLAYED',$this->roundA14153),
            array(2,4,'04-10-2014 16:00:00',$this->lasalle,$this->sallent,'PLAYED',$this->roundA14153),
            array(1,1,'05-10-2014 11:00:00',$this->america,$this->guardiolenca,'PLAYED',$this->roundB14153),
            array(4,2,'04-10-2014 16:00:00',$this->navas,$this->atcastellbell,'PLAYED',$this->roundB14153),
            array(2,5,'04-10-2014 18:00:00',$this->avinyo,$this->udbalsareny,'PLAYED',$this->roundB14153),
            array(2,2,'05-10-2014 11:00:00',$this->monistrol,$this->solsona,'PLAYED',$this->roundB14153),
            array(4,1,'05-10-2014 11:00:00',$this->navarcles,$this->castellnou,'PLAYED',$this->roundB14153),
            array(1,1,'04-10-2014 18:00:00',$this->pirinaica,$this->atgironella,'PLAYED',$this->roundB14153),
            array(4,1,'05-10-2014 10:00:00',$this->olesa,$this->pala,'PLAYED',$this->roundC14153),
            array(1,2,'04-10-2014 16:00:00',$this->verdiblanca,$this->pradenc,'PLAYED',$this->roundC14153),
            array(3,2,'05-10-2014 11:00:00',$this->suria,$this->xup,'PLAYED',$this->roundC14153),
            array(2,1,'04-10-2014 18:15:00',$this->vilomara,$this->calrosal,'PLAYED',$this->roundC14153),
            array(2,0,'04-10-2014 18:00:00',$this->puigreig,$this->artes,'PLAYED',$this->roundC14153),
            array(0,1,'04-10-2014 18:30:00',$this->callus,$this->fruitosenc,'PLAYED',$this->roundC14153),

            array(3,2,'11-10-2014 18:00:00',$this->sallent,$this->castellgali,'PLAYED',$this->roundA14154),
            array(0,2,'12-10-2014 11:00:00',$this->marroc,$this->lasalle,'PLAYED',$this->roundA14154),
            array(5,0,'12-10-2014 10:00:00',$this->berga,$this->joanenc,'PLAYED',$this->roundA14154),
            array(2,1,'12-10-2014 11:00:00',$this->castellet,$this->castellbell,'PLAYED',$this->roundA14154),
            array(2,5,'11-10-2014 16:00:00',$this->balsareny,$this->minorisa,'PLAYED',$this->roundA14154),
            array(3,4,'12-10-2014 09:00:00',$this->santpedor,$this->lacoromina,'PLAYED',$this->roundA14154),
            array(3,0,'11-10-2014 18:00:00',$this->atgironella,$this->america,'PLAYED',$this->roundB14154),
            array(0,6,'11-10-2014 16:30:00',$this->castellnou,$this->pirinaica,'PLAYED',$this->roundB14154),
            array(2,0,'11-10-2014 18:15:00',$this->solsona,$this->navarcles,'PLAYED',$this->roundB14154),
            array(2,1,'11-10-2014 16:30:00',$this->udbalsareny,$this->monistrol,'PLAYED',$this->roundB14154),
            array(6,4,'11-10-2014 18:30:00',$this->atcastellbell,$this->avinyo,'PLAYED',$this->roundB14154),
            array(3,5,'12-10-2014 11:00:00',$this->guardiolenca,$this->navas,'PLAYED',$this->roundB14154),
            array(5,2,'11-10-2014 18:00:00',$this->fruitosenc,$this->olesa,'PLAYED',$this->roundC14154),
            array(3,2,'12-10-2014 11:00:00',$this->artes,$this->callus,'PLAYED',$this->roundC14154),
            array(1,1,'12-10-2014 11:30:00',$this->calrosal,$this->puigreig,'PLAYED',$this->roundC14154),
            array(1,2,'11-10-2014 17:00:00',$this->xup,$this->vilomara,'PLAYED',$this->roundC14154),
            array(1,4,'11-10-2014 18:00:00',$this->pradenc,$this->suria,'PLAYED',$this->roundC14154),
            array(3,1,'11-10-2014 18:00:00',$this->pala,$this->verdiblanca,'PLAYED',$this->roundC14154),

            //array(0,0,'20-09-2014 00:00:00',$this->,$this->,'SCHEDULED',$this->roundA14154),
            array(6,2,'18-10-2014 16:00:00',$this->castellbell,$this->balsareny,'PLAYED',$this->roundA14155),
            array(5,2,'19-10-2014 11:00:00',$this->minorisa,$this->santpedor,'PLAYED',$this->roundA14155),
            array(8,3,'18-10-2014 15:30:00',$this->castellgali,$this->lacoromina,'PLAYED',$this->roundA14155),
            array(0,0,'18-10-2014 20:00:00',$this->joanenc,$this->castellet,'PLAYED',$this->roundA14155),
            array(2,3,'18-10-2014 16:00:00',$this->lasalle,$this->berga,'PLAYED',$this->roundA14155),
            array(2,1,'18-10-2014 18:00:00',$this->sallent,$this->marroc,'PLAYED',$this->roundA14155),
            array(6,3,'19-10-2014 11:00:00',$this->monistrol,$this->atcastellbell,'PLAYED',$this->roundB14155),
            array(0,3,'18-10-2014 18:00:00',$this->avinyo,$this->guardiolenca,'PLAYED',$this->roundB14155),
            array(0,1,'19-10-2014 11:00:00',$this->america,$this->navas,'PLAYED',$this->roundB14155),
            array(1,2,'19-10-2014 12:00:00',$this->navarcles,$this->udbalsareny,'PLAYED',$this->roundB14155),
            array(2,1,'18-10-2014 18:00:00',$this->pirinaica,$this->solsona,'PLAYED',$this->roundB14155),
            array(3,0,'01-11-2014 18:30:00',$this->atgironella,$this->castellnou,'PLAYED',$this->roundB14155),
            array(8,2,'19-10-2014 12:00:00',$this->olesa,$this->verdiblanca,'PLAYED',$this->roundC14155),
            array(4,0,'19-10-2014 12:00:00',$this->suria,$this->pala,'PLAYED',$this->roundC14155),
            array(5,1,'18-10-2014 17:00:00',$this->vilomara,$this->pradenc,'PLAYED',$this->roundC14155),
            array(0,3,'19-10-2014 11:00:00',$this->puigreig,$this->xup,'PLAYED',$this->roundC14155),
            array(0,2,'18-10-2014 18:15:00',$this->callus,$this->calrosal,'PLAYED',$this->roundC14155),
            array(3,1,'18-10-2014 20:00:00',$this->fruitosenc,$this->artes,'PLAYED',$this->roundC14155),

            array(0,0,'26-10-2014 11:00:00',$this->marroc,$this->castellgali,'PLAYED',$this->roundA14156),
            array(3,3,'26-10-2014 12:00:00',$this->berga,$this->sallent,'PLAYED',$this->roundA14156),
            array(5,2,'26-10-2014 11:30:00',$this->castellet,$this->lasalle,'PLAYED',$this->roundA14156),
            array(2,3,'26-10-2014 10:00:00',$this->balsareny,$this->joanenc,'PLAYED',$this->roundA14156),
            array(0,8,'25-10-2014 20:00:00',$this->santpedor,$this->castellbell,'PLAYED',$this->roundA14156),
            array(2,1,'26-10-2014 10:00:00',$this->lacoromina,$this->minorisa,'PLAYED',$this->roundA14156),
            array(2,3,'25-10-2014 16:00:00',$this->castellnou,$this->america,'PLAYED',$this->roundB14156),
            array(0,0,'25-10-2014 00:00:00',$this->solsona,$this->atgironella,'SUSPENDED',$this->roundB14156),
            array(0,0,'25-10-2014 15:30:00',$this->udbalsareny,$this->pirinaica,'PLAYED',$this->roundB14156),
            array(1,4,'25-10-2014 16:30:00',$this->atcastellbell,$this->navarcles,'PLAYED',$this->roundB14156),
            array(1,1,'26-10-2014 11:00:00',$this->guardiolenca,$this->monistrol,'PLAYED',$this->roundB14156),
            array(9,0,'25-10-2014 15:30:00',$this->navas,$this->avinyo,'PLAYED',$this->roundB14156),
            array(2,7,'26-10-2014 11:00:00',$this->artes,$this->olesa,'PLAYED',$this->roundC14156),
            array(1,5,'26-10-2014 11:00:00',$this->calrosal,$this->fruitosenc,'PLAYED',$this->roundC14156),
            array(4,0,'25-10-2014 15:45:00',$this->xup,$this->callus,'PLAYED',$this->roundC14156),
            array(1,2,'26-10-2014 11:00:00',$this->pradenc,$this->puigreig,'PLAYED',$this->roundC14156),
            array(0,1,'26-10-2014 12:00:00',$this->pala,$this->vilomara,'PLAYED',$this->roundC14156),
            array(0,6,'25-10-2014 15:30:00',$this->verdiblanca,$this->suria,'PLAYED',$this->roundC14156),

            array(0,3,'08-11-2014 16:30:00',$this->castellgali,$this->minorisa,'PLAYED',$this->roundA14157),
            array(5,0,'08-11-2014 16:00:00',$this->castellbell,$this->lacoromina,'PLAYED',$this->roundA14157),
            array(4,0,'08-11-2014 18:00:00',$this->joanenc,$this->santpedor,'PLAYED',$this->roundA14157),
            array(5,1,'08-11-2014 18:00:00',$this->lasalle,$this->balsareny,'PLAYED',$this->roundA14157),
            array(2,3,'08-11-2014 17:00:00',$this->sallent,$this->castellet,'PLAYED',$this->roundA14157),
            array(3,1,'08-11-2014 16:00:00',$this->marroc,$this->berga,'PLAYED',$this->roundA14157),
            array(4,2,'09-11-2014 11:00:00',$this->america,$this->avinyo,'PLAYED',$this->roundB14157),
            array(1,5,'09-11-2014 11:00:00',$this->monistrol,$this->navas,'PLAYED',$this->roundB14157),
            array(1,1,'09-11-2014 11:30:00',$this->navarcles,$this->guardiolenca,'PLAYED',$this->roundB14157),
            array(3,0,'08-11-2014 16:00:00',$this->pirinaica,$this->atcastellbell,'PLAYED',$this->roundB14157),
            array(2,1,'08-11-2014 18:00:00',$this->atgironella,$this->udbalsareny,'PLAYED',$this->roundB14157),
            array(0,4,'08-11-2014 16:00:00',$this->castellnou,$this->solsona,'PLAYED',$this->roundB14157),
            array(3,0,'09-11-2014 12:00:00',$this->olesa,$this->suria,'PLAYED',$this->roundC14157),
            array(5,1,'08-11-2014 17:00:00',$this->vilomara,$this->verdiblanca,'PLAYED',$this->roundC14157),
            array(4,2,'09-11-2014 11:00:00',$this->puigreig,$this->pala,'PLAYED',$this->roundC14157),
            array(5,2,'08-11-2014 19:00:00',$this->callus,$this->pradenc,'PLAYED',$this->roundC14157),
            array(1,0,'09-11-2014 10:00:00',$this->fruitosenc,$this->xup,'PLAYED',$this->roundC14157),
            array(1,3,'09-11-2014 11:00:00',$this->artes,$this->calrosal,'PLAYED',$this->roundC14157),

            array(2,1,'15-11-2014 19:00:00',$this->berga,$this->castellgali,'PLAYED',$this->roundA14158),
            array(3,3,'15-11-2014 19:00:00',$this->castellet,$this->marroc,'PLAYED',$this->roundA14158),
            array(1,1,'15-11-2014 18:00:00',$this->balsareny,$this->sallent,'PLAYED',$this->roundA14158),
            array(3,2,'15-11-2014 18:30:00',$this->santpedor,$this->lasalle,'PLAYED',$this->roundA14158),
            array(7,3,'15-11-2014 18:00:00',$this->lacoromina,$this->joanenc,'PLAYED',$this->roundA14158),
            array(0,1,'16-11-2014 11:00:00',$this->minorisa,$this->castellbell,'PLAYED',$this->roundA14158),
            array(2,1,'16-11-2014 12:15:00',$this->solsona,$this->america,'PLAYED',$this->roundB14158),
            array(8,0,'16-11-2014 10:00:00',$this->udbalsareny,$this->castellnou,'PLAYED',$this->roundB14158),
            array(2,2,'15-11-2014 16:00:00',$this->atcastellbell,$this->atgironella,'PLAYED',$this->roundB14158),
            array(1,4,'16-11-2014 11:00:00',$this->guardiolenca,$this->pirinaica,'PLAYED',$this->roundB14158),
            array(6,0,'15-11-2014 18:00:00',$this->navas,$this->navarcles,'PLAYED',$this->roundB14158),
            array(4,4,'15-11-2014 18:00:00',$this->avinyo,$this->monistrol,'PLAYED',$this->roundB14158),
            array(3,6,'15-11-2014 16:00:00',$this->calrosal,$this->olesa,'PLAYED',$this->roundC14158),
            array(7,0,'15-11-2014 16:00:00',$this->xup,$this->artes,'PLAYED',$this->roundC14158),
            array(1,4,'15-11-2014 18:00:00',$this->pradenc,$this->fruitosenc,'PLAYED',$this->roundC14158),
            array(1,1,'16-11-2014 11:00:00',$this->pala,$this->callus,'PLAYED',$this->roundC14158),
            array(2,1,'15-11-2014 16:00:00',$this->verdiblanca,$this->puigreig,'PLAYED',$this->roundC14158),
            array(1,3,'16-11-2014 12:00:00',$this->suria,$this->vilomara,'PLAYED',$this->roundC14158),

            array(2,4,'22-11-2014 16:30:00',$this->castellgali,$this->castellbell,'PLAYED',$this->roundA14159),            
            array(1,4,'22-11-2014 20:00:00',$this->joanenc,$this->minorisa,'PLAYED',$this->roundA14159),            
            array(2,1,'22-11-2014 16:00:00',$this->lasalle,$this->lacoromina,'PLAYED',$this->roundA14159),            
            array(1,1,'22-11-2014 16:30:00',$this->sallent,$this->santpedor,'PLAYED',$this->roundA14159),            
            array(1,1,'22-11-2014 16:00:00',$this->marroc,$this->balsareny,'PLAYED',$this->roundA14159),            
            array(4,4,'22-11-2014 18:00:00',$this->berga,$this->castellet,'PLAYED',$this->roundA14159),            
            array(0,2,'23-11-2014 11:00:00',$this->america,$this->monistrol,'PLAYED',$this->roundB14159),            
            array(6,4,'23-11-2014 11:30:00',$this->navarcles,$this->avinyo,'PLAYED',$this->roundB14159),            
            array(2,1,'22-11-2014 18:00:00',$this->pirinaica,$this->navas,'PLAYED',$this->roundB14159),            
            array(3,1,'22-11-2014 18:00:00',$this->atgironella,$this->guardiolenca,'PLAYED',$this->roundB14159),            
            array(3,6,'22-11-2014 16:00:00',$this->castellnou,$this->atcastellbell,'PLAYED',$this->roundB14159),            
            array(4,1,'23-11-2014 12:15:00',$this->solsona,$this->udbalsareny,'PLAYED',$this->roundB14159),            
            array(0,2,'23-11-2014 12:00:00',$this->olesa,$this->vilomara,'PLAYED',$this->roundC14159),
            array(1,0,'23-11-2014 12:15:00',$this->puigreig,$this->suria,'PLAYED',$this->roundC14159),
            array(4,2,'22-11-2014 16:00:00',$this->callus,$this->verdiblanca,'PLAYED',$this->roundC14159),
            array(7,1,'23-11-2014 10:00:00',$this->fruitosenc,$this->pala,'PLAYED',$this->roundC14159),
            array(5,3,'23-11-2014 10:30:00',$this->artes,$this->pradenc,'PLAYED',$this->roundC14159),
            array(2,3,'23-11-2014 11:00:00',$this->calrosal,$this->xup,'PLAYED',$this->roundC14159),

            array(2,3,'29-11-2014 16:00:00',$this->castellgali,$this->castellet,'PLAYED',$this->roundA141510),
            array(3,2,'29-11-2014 17:00:00',$this->balsareny,$this->berga,'PLAYED',$this->roundA141510),
            array(4,2,'30-11-2014 09:00:00',$this->santpedor,$this->marroc,'PLAYED',$this->roundA141510),
            array(0,0,'30-11-2014 12:00:00',$this->lacoromina,$this->sallent,'SUSPENDED',$this->roundA141510),
            array(2,1,'30-11-2014 11:00:00',$this->minorisa,$this->lasalle,'PLAYED',$this->roundA141510),
            array(5,2,'29-11-2014 16:00:00',$this->castellbell,$this->joanenc,'PLAYED',$this->roundA141510),
            array(2,5,'29-11-2014 17:00:00',$this->america,$this->udbalsareny,'PLAYED',$this->roundB141510),
            array(1,0,'30-11-2014 09:15:00',$this->atcastellbell,$this->solsona,'PLAYED',$this->roundB141510),
            array(0,0,'30-11-2014 11:00:00',$this->guardiolenca,$this->castellnou,'SUSPENDED',$this->roundB141510),
            array(1,0,'29-11-2014 16:00:00',$this->navas,$this->atgironella,'PLAYED',$this->roundB141510),
            array(4,3,'29-11-2014 18:00:00',$this->avinyo,$this->pirinaica,'PLAYED',$this->roundB141510),
            array(2,2,'30-11-2014 11:00:00',$this->monistrol,$this->navarcles,'PLAYED',$this->roundB141510),
            array(2,1,'30-11-2014 10:30:00',$this->olesa,$this->xup,'PLAYED',$this->roundC141510),
            array(0,1,'29-11-2014 16:00:00',$this->pradenc,$this->calrosal,'PLAYED',$this->roundC141510),
            array(4,0,'30-11-2014 10:00:00',$this->pala,$this->artes,'PLAYED',$this->roundC141510),
            array(0,0,'29-11-2014 16:00:00',$this->verdiblanca,$this->fruitosenc,'SUSPENDED',$this->roundC141510),
            array(0,2,'30-11-2014 11:00:00',$this->suria,$this->callus,'PLAYED',$this->roundC141510),
            array(2,3,'29-11-2014 17:00:00',$this->vilomara,$this->puigreig,'PLAYED',$this->roundC141510),

            //array(0,0,'15-11-2014 00:00:00',$this->,$this->,'SCHEDULED',$this->roundA14158),

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

        $league = new League();
        $league->setName('Lliga intercomarcal de veterans');
        $league->setDivision('GRUP C');
        $league->setSeason('Temporada 2014/2015');
        $league->setDateBegin(date_create_from_format('d-m-Y','20-09-2014'));
        $league->setDateEnd(date_create_from_format('d-m-Y','31-05-2015'));
        $manager->persist($league);
    }

    public function createRounds(ObjectManager $manager)
    {

        $this->getLeagues($manager);

        $rounds = array(
            array('Jornada1','1',$this->leagueB1314, false),
            array('Jornada2','2',$this->leagueB1314, false),
            array('Jornada3','3',$this->leagueB1314, false),
            array('Jornada4','4',$this->leagueB1314, false),
            array('Jornada5','5',$this->leagueB1314, false),
            array('Jornada6','6',$this->leagueB1314, false),
            array('Jornada7','7',$this->leagueB1314, false),
            array('Jornada8','8',$this->leagueB1314, false),
            array('Jornada9','9',$this->leagueB1314, false),
            array('Jornada10','10',$this->leagueB1314, false),
            array('Jornada11','11',$this->leagueB1314, false),
            array('Jornada12','12',$this->leagueB1314, false),
            array('Jornada13','13',$this->leagueB1314, false),
            array('Jornada14','14',$this->leagueB1314, false),
            array('Jornada15','15',$this->leagueB1314, false),
            array('Jornada16','16',$this->leagueB1314, false),
            array('Jornada17','17',$this->leagueB1314, false),
            array('Jornada18','18',$this->leagueB1314, false),
            array('Jornada19','19',$this->leagueB1314, false),
            array('Jornada20','20',$this->leagueB1314, false),
            array('Jornada21','21',$this->leagueB1314, false),
            array('Jornada22','22',$this->leagueB1314, false),
            array('Jornada1','1',$this->leagueA1415, false),
            array('Jornada2','2',$this->leagueA1415, false),
            array('Jornada3','3',$this->leagueA1415, false),
            array('Jornada4','4',$this->leagueA1415, false),
            array('Jornada5','5',$this->leagueA1415, false),
            array('Jornada6','6',$this->leagueA1415, false),
            array('Jornada7','7',$this->leagueA1415, false),
            array('Jornada8','8',$this->leagueA1415, false),
            array('Jornada9','9',$this->leagueA1415, false),
            array('Jornada10','10',$this->leagueA1415, false),
            array('Jornada11','11',$this->leagueA1415, false),
            array('Jornada12','12',$this->leagueA1415, false),
            array('Jornada13','13',$this->leagueA1415, false),
            array('Jornada14','14',$this->leagueA1415, false),
            array('Jornada15','15',$this->leagueA1415, false),
            array('Jornada16','16',$this->leagueA1415, false),
            array('Jornada17','17',$this->leagueA1415, false),
            array('Jornada18','18',$this->leagueA1415, false),
            array('Jornada19','19',$this->leagueA1415, false),
            array('Jornada20','20',$this->leagueA1415, false),
            array('Jornada21','21',$this->leagueA1415, false),
            array('Jornada22','22',$this->leagueA1415, false),
            array('Jornada1','1',$this->leagueB1415, false),
            array('Jornada2','2',$this->leagueB1415, false),
            array('Jornada3','3',$this->leagueB1415, false),
            array('Jornada4','4',$this->leagueB1415, false),
            array('Jornada5','5',$this->leagueB1415, false),
            array('Jornada6','6',$this->leagueB1415, false),
            array('Jornada7','7',$this->leagueB1415, false),
            array('Jornada8','8',$this->leagueB1415, false),
            array('Jornada9','9',$this->leagueB1415, false),
            array('Jornada10','10',$this->leagueB1415, false),
            array('Jornada11','11',$this->leagueB1415, false),
            array('Jornada12','12',$this->leagueB1415, false),
            array('Jornada13','13',$this->leagueB1415, false),
            array('Jornada14','14',$this->leagueB1415, false),
            array('Jornada15','15',$this->leagueB1415, false),
            array('Jornada16','16',$this->leagueB1415, false),
            array('Jornada17','17',$this->leagueB1415, false),
            array('Jornada18','18',$this->leagueB1415, false),
            array('Jornada19','19',$this->leagueB1415, false),
            array('Jornada20','20',$this->leagueB1415, false),
            array('Jornada21','21',$this->leagueB1415, false),
            array('Jornada22','22',$this->leagueB1415, false),
            array('Jornada1','1',$this->leagueC1415, false),
            array('Jornada2','2',$this->leagueC1415, false),
            array('Jornada3','3',$this->leagueC1415, false),
            array('Jornada4','4',$this->leagueC1415, false),
            array('Jornada5','5',$this->leagueC1415, false),
            array('Jornada6','6',$this->leagueC1415, false),
            array('Jornada7','7',$this->leagueC1415, false),
            array('Jornada8','8',$this->leagueC1415, false),
            array('Jornada9','9',$this->leagueC1415, false),
            array('Jornada10','10',$this->leagueC1415, false),
            array('Jornada11','11',$this->leagueC1415, false),
            array('Jornada12','12',$this->leagueC1415, false),
            array('Jornada13','13',$this->leagueC1415, false),
            array('Jornada14','14',$this->leagueC1415, false),
            array('Jornada15','15',$this->leagueC1415, false),
            array('Jornada16','16',$this->leagueC1415, false),
            array('Jornada17','17',$this->leagueC1415, false),
            array('Jornada18','18',$this->leagueC1415, false),
            array('Jornada19','19',$this->leagueC1415, false),
            array('Jornada20','20',$this->leagueC1415, false),
            array('Jornada21','21',$this->leagueC1415, false),
            array('Jornada22','22',$this->leagueC1415, false)
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

  public function addClubsToLeagues(ObjectManager $manager) {
    
        $this->getClubs($manager);
        $this->getLeagues($manager);      
  
        $this->leagueB1314 = $this->leagueB1314->addClub($this->castellnou);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->monistrol);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->marroc);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->navas);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->navarcles);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->vilomara);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->castellbell);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->joanenc);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->santpedor);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->artes);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->callus);
        $this->leagueB1314 = $this->leagueB1314->addClub($this->pala);
        $manager->persist($this->leagueB1314);
   
        $this->leagueA1415 = $this->leagueA1415->addClub($this->castellbell);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->minorisa);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->castellet);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->sallent);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->lacoromina);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->berga);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->lasalle);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->joanenc);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->santpedor);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->marroc);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->castellgali);
        $this->leagueA1415 = $this->leagueA1415->addClub($this->balsareny);
        $manager->persist($this->leagueA1415);

        $this->leagueB1415 = $this->leagueB1415->addClub($this->castellnou);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->avinyo);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->monistrol);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->navas);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->navarcles);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->udbalsareny);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->atgironella);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->atcastellbell);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->america);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->guardiolenca);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->pirinaica);
        $this->leagueB1415 = $this->leagueB1415->addClub($this->solsona);
        $manager->persist($this->leagueB1415);

        $this->leagueC1415 = $this->leagueC1415->addClub($this->vilomara);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->olesa);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->fruitosenc);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->puigreig);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->suria);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->xup);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->calrosal);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->callus);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->pala);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->artes);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->verdiblanca);
        $this->leagueC1415 = $this->leagueC1415->addClub($this->pradenc);
        $manager->persist($this->leagueC1415);

  }

}