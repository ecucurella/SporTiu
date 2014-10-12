<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use ecucurella\SporTiuBundle\Tests\DataFixtures\ORM\LoadFixturesClubsData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use Doctrine\ORM\EntityManager;

class LeaguesControllerTest extends WebTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    protected $em;

    protected function loadData() {
        $fixture = new LoadFixturesClubsData();
        $fixture->loadleagues($this->em);   
    }

    protected function loadDataWithGames() {
        $fixture = new LoadFixturesClubsData();  
        $fixture->load($this->em);   
        $fixture->loadLeagues($this->em);   
        $fixture->loadRounds($this->em);           
        $fixture->loadGamesWithRounds($this->em);           
    }

    public function testLeagues() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/leagues');
        $this->assertEquals(1,$crawler->filter('h1:contains("Leagues")')->count());
        $this->assertEquals(1,$crawler->filter('h4')->count());
        $this->assertEquals(1,$crawler->filter('h4:contains("Lliga")')->count());
        $this->assertEquals(1,$crawler->filter('p')->count());
        $this->assertEquals(1,$crawler->filter('p:contains("GRUP A")')->count());
        $this->assertEquals(1,$crawler->filter('p:contains("Temporada 2013/2014")')->count());
    }
    public function testNoLeagues() {
        self::createSchema();
        $client = static::createClient();
        $crawler = $client->request('GET', '/leagues');
        $this->assertEquals(1,$crawler->filter('h1:contains("Leagues")')->count());
        $this->assertEquals(0,$crawler->filter('h4')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());
        $this->assertEquals(1,$crawler->filter('div.alert:contains("There is no Leagues in database yet")')->count());
    }

    public function testLeaguesLink() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/leagues');
        $this->assertEquals(1,$crawler->filter('h1:contains("Leagues")')->count());
        $this->assertEquals(1,$crawler->filter('h4')->count());
        $this->assertEquals(1,$crawler->filter('h4:contains("Lliga")')->count());
        $link = $crawler->selectLink('Lliga')->link();
        $crawler = $client->click($link);
        $this->assertEquals(1,$crawler->filter('h1:contains("Lliga")')->count());
        $this->assertEquals(4,$crawler->filter('p')->count());
        $this->assertEquals('Temporada: Temporada 2013/2014',$crawler->filter('p')->eq(0)->text());
        $this->assertEquals('Grup: GRUP A',$crawler->filter('p')->eq(1)->text());
        $this->assertEquals('Data inici: 01-09-2013',$crawler->filter('p')->eq(2)->text());
        $this->assertEquals('Data fi: 30-06-2014',$crawler->filter('p')->eq(3)->text());
    }

    public function testLeagueId() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/leagues/league/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Lliga")')->count());
        $this->assertEquals(4,$crawler->filter('p')->count());
        $this->assertEquals('Temporada: Temporada 2013/2014',$crawler->filter('p')->eq(0)->text());
        $this->assertEquals('Grup: GRUP A',$crawler->filter('p')->eq(1)->text());
        $this->assertEquals('Data inici: 01-09-2013',$crawler->filter('p')->eq(2)->text());
        $this->assertEquals('Data fi: 30-06-2014',$crawler->filter('p')->eq(3)->text());
    }

    public function testNoLeagueId() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/leagues/league/2');
        $this->assertEquals(1,$crawler->filter('h1:contains("League")')->count());
        $this->assertEquals(0,$crawler->filter('h1:contains("Lliga")')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());
        $this->assertEquals(1,$crawler->filter('div.alert:contains("There is no League with id 2")')->count());
    }

    public function testLeagueWithClassificationAndRounds() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/leagues/league/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Lliga")')->count());
        $this->assertEquals(4,$crawler->filter('p')->count());
        $this->assertEquals('Temporada: Temporada 2013/2014',$crawler->filter('p')->eq(0)->text());
        $this->assertEquals('Grup: GRUP A',$crawler->filter('p')->eq(1)->text());
        $this->assertEquals('Data inici: 01-09-2013',$crawler->filter('p')->eq(2)->text());
        $this->assertEquals('Data fi: 30-06-2014',$crawler->filter('p')->eq(3)->text());        
        
        //Check Classification
        $this->assertEquals(1,$crawler->filter('h1:contains("Classification")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        //19 tr: 7 for classification and 12 for two rounds
        $this->assertEquals(7,$crawler->filter('#classification tr')->count());
        
        $expected  = array(
            array('POS','CLUB','P','W','L','D','GF','GA','GD','PTS'),
            array('1','CASTELLNOU1', '3','3','0','0','4','0','4','9'),
            array('2','CASTELLNOU2', '3','2','1','0','3','1','2','7'),
            array('3','CASTELLNOU3', '3','1','1','1','2','2','0','4'),
            array('4','CASTELLNOU4', '3','0','2','1','2','3','-1','2'),
            array('5','CASTELLNOU5', '2','0','0','2','0','2','-2','0'),
            array('6','CASTELLNOU6', '2','0','0','2','0','3','-3','0')
        );
        for ($j=1; $j < 7 ; $j++) { 
            $fila = $crawler->filter('#classification tr')->eq($j);
            $this->assertEquals(10,$fila->filter('td')->count());
            for ($i=0; $i < 10 ; $i++) { 
                $actual = $fila->filter('td')->eq($i)->text();
                $this->assertEquals($expected[$j][$i],$actual);
            }            
        }

        //TODO: Check Data from 3 Rounds
        $this->assertEquals(1,$crawler->filter('h1:contains("Rounds")')->count());
        $this->assertEquals(4,$crawler->filter('#Jornada3 tr')->count());
        $this->assertEquals(4,$crawler->filter('#Jornada2 tr')->count());
        $this->assertEquals(4,$crawler->filter('#Jornada1 tr')->count());

    }

    protected function createSchema()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
        SporTiuSchema::dropSchema($this->em);
        SporTiuSchema::createSchema($this->em);
    }

    protected function dropSchema()
    {
        SporTiuSchema::dropSchema($this->em);
        $this->em->close();
    }

    protected function tearDown()
    {
        if (!is_null($this->em)) {
            $fixture = new LoadFixturesClubsData();
            $fixture->unload($this->em);
            self::dropSchema();
        }
        parent::tearDown();
    }

}
