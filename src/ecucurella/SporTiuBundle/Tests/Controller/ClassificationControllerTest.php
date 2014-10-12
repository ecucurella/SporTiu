<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use ecucurella\SporTiuBundle\Tests\DataFixtures\ORM\LoadFixturesClubsData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use Doctrine\ORM\EntityManager;

class ClassificationControllerTest extends WebTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    protected $em;

    protected function loadData() {
        $fixture = new LoadFixturesClubsData();  
        $fixture->load($this->em);   
        $fixture->loadLeagues($this->em);   
        $fixture->loadRounds($this->em);           
    }

    protected function loadDataWithGames() {
        $fixture = new LoadFixturesClubsData();  
        $fixture->load($this->em);   
        $fixture->loadLeagues($this->em);   
        $fixture->loadRounds($this->em);           
        $fixture->loadGamesWithRounds($this->em);           
    }

    public function testNoClassification() {
        self::createSchema();
        $client = static::createClient();
        $crawler = $client->request('GET', '/classification/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Round")')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());
        $this->assertEquals(1,$crawler->filter('div.alert:contains("There is no round with id 1 !!")')->count());
    }
    
    public function testClassificationWithoutGames() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/classification/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada1")')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());
        $this->assertEquals(1,$crawler->filter('div.alert:contains("There are no games played for this round !!")')->count());
    }

    public function testClassificationWithGames() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/classification/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada1")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        $this->assertEquals(7,$crawler->filter('tr')->count());
        
        $expected  = array(
            array('POS','CLUB','P','W','L','D','GF','GA','GD','PTS'),
            array('1','CASTELLNOU1', '1','1','0','0','2','0','2','3'),
            array('2','CASTELLNOU2', '1','1','0','0','1','0','1','3'),
            array('3','CASTELLNOU3', '1','0','1','0','1','1','0','1'),
            array('4','CASTELLNOU4', '1','0','1','0','1','1','0','1'),
            array('5','CASTELLNOU5', '1','0','0','1','0','1','-1','0'),
            array('6','CASTELLNOU6', '1','0','0','1','0','2','-2','0'),
        );
        for ($j=1; $j < 7 ; $j++) { 
            $fila = $crawler->filter('tr')->eq($j);
            $this->assertEquals(10,$fila->filter('td')->count());
            for ($i=0; $i < 10 ; $i++) { 
                $actual = $fila->filter('td')->eq($i)->text();
                $this->assertEquals($expected[$j][$i],$actual);
            }            
        }

    }

    public function testClassificationRecursive() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/classification/2');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada2")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        $this->assertEquals(7,$crawler->filter('tr')->count());
        
        $expected  = array(
            array('POS','CLUB','P','W','L','D','GF','GA','GD','PTS'),
            array('1','CASTELLNOU1', '2','2','0','0','3','0','3','6'),
            array('2','CASTELLNOU2', '2','2','0','0','2','0','2','6'),
            array('3','CASTELLNOU3', '2','1','1','0','2','1','1','4'),
            array('4','CASTELLNOU4', '2','0','1','1','1','2','-1','1'),
            array('5','CASTELLNOU5', '2','0','0','2','0','2','-2','0'),
            array('6','CASTELLNOU6', '2','0','0','2','0','3','-3','0'),
        );
        for ($j=1; $j < 7 ; $j++) { 
            $fila = $crawler->filter('tr')->eq($j);
            $this->assertEquals(10,$fila->filter('td')->count());
            for ($i=0; $i < 10 ; $i++) { 
                $actual = $fila->filter('td')->eq($i)->text();
                $this->assertEquals($expected[$j][$i],$actual);
            }            
        }

    }

    public function testClassificationSuspendedGame() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/classification/3');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada3")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        $this->assertEquals(7,$crawler->filter('tr')->count());
        
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
            $fila = $crawler->filter('tr')->eq($j);
            $this->assertEquals(10,$fila->filter('td')->count());
            for ($i=0; $i < 10 ; $i++) { 
                $actual = $fila->filter('td')->eq($i)->text();
                $this->assertEquals($expected[$j][$i],$actual);
            }            
        }

        //PLAY GAME SUSPENDED
        $fixture = new LoadFixturesClubsData();  
        $fixture->playGamesSuspended($this->em); 
        $this->em->flush();

        //CHECK CLASSIFICATION          
        $crawler = $client->request('GET', '/classification/3');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada3")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        $this->assertEquals(7,$crawler->filter('tr')->count());
        
        $expected  = array(
            array('POS','CLUB','P','W','L','D','GF','GA','GD','PTS'),
            array('1','CASTELLNOU1', '3','3','0','0','4','0','4','9'),
            array('2','CASTELLNOU2', '3','2','1','0','3','1','2','7'),
            array('3','CASTELLNOU3', '3','1','1','1','2','2','0','4'),
            array('4','CASTELLNOU4', '3','0','2','1','2','3','-1','2'),
            array('5','CASTELLNOU5', '3','0','1','2','1','3','-2','1'),
            array('6','CASTELLNOU6', '3','0','1','2','1','4','-3','1')
        );
        for ($j=1; $j < 7 ; $j++) { 
            $fila = $crawler->filter('tr')->eq($j);
            $this->assertEquals(10,$fila->filter('td')->count());
            for ($i=0; $i < 10 ; $i++) { 
                $actual = $fila->filter('td')->eq($i)->text();
                $this->assertEquals($expected[$j][$i],$actual);
            }            
        }

    }

    public function testClassificationWithGamesPReviousRound() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        
        //load Classification for Round 2
        $crawler = $client->request('GET', '/classification/2');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada2")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        $this->assertEquals(7,$crawler->filter('tr')->count());

        //check then Classification for Round1 remain equal
        $crawler = $client->request('GET', '/classification/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Jornada1")')->count());
        $this->assertEquals(0,$crawler->filter('div.alert')->count());
        $this->assertEquals(7,$crawler->filter('tr')->count());
        
        $expected  = array(
            array('POS','CLUB','P','W','L','D','GF','GA','GD','PTS'),
            array('1','CASTELLNOU1', '1','1','0','0','2','0','2','3'),
            array('2','CASTELLNOU2', '1','1','0','0','1','0','1','3'),
            array('3','CASTELLNOU3', '1','0','1','0','1','1','0','1'),
            array('4','CASTELLNOU4', '1','0','1','0','1','1','0','1'),
            array('5','CASTELLNOU5', '1','0','0','1','0','1','-1','0'),
            array('6','CASTELLNOU6', '1','0','0','1','0','2','-2','0'),
        );
        for ($j=1; $j < 7 ; $j++) { 
            $fila = $crawler->filter('tr')->eq($j);
            $this->assertEquals(10,$fila->filter('td')->count());
            for ($i=0; $i < 10 ; $i++) { 
                $actual = $fila->filter('td')->eq($i)->text();
                $this->assertEquals($expected[$j][$i],$actual);
            }            
        }

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
