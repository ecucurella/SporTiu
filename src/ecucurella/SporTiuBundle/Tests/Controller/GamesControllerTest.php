<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use ecucurella\SporTiuBundle\Tests\DataFixtures\ORM\LoadFixturesClubsData;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use Doctrine\ORM\EntityManager;

class GamesControllerTest extends WebTestCase
{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    protected $em;

    protected function loadData() {
        $fixture = new LoadFixturesClubsData();
        $fixture->load($this->em);   
    }

    protected function loadDataWithGames() {
        $fixture = new LoadFixturesClubsData();
        $fixture->load($this->em); 
        $fixture->loadGames($this->em);  
    }

    public function testNoGames() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games');
        $this->assertEquals(1,$crawler->filter('h1:contains("Next games")')->count());
        $this->assertEquals(1,$crawler->filter('h1:contains("Last games")')->count());
        $this->assertEquals(0,$crawler->filter('table')->count());
        $this->assertEquals(2,$crawler->filter('div.alert')->count());
        $this->assertRegExp('/There is no scheduled games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
        $this->assertRegExp('/There is no played games in database yet !!/',$crawler->filter('div.alert')->eq(1)->text());
    }

    public function testNoLastGames() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/last');
        $this->assertEquals(0,$crawler->filter('h1:contains("Next games")')->count());
        $this->assertEquals(1,$crawler->filter('h1:contains("Last games")')->count());
        $this->assertEquals(0,$crawler->filter('table')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());
        $this->assertNotRegExp('/There is no scheduled games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
        $this->assertRegExp('/There is no played games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
    }

    public function testNoNextGames() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/next');
        $this->assertEquals(1,$crawler->filter('h1:contains("Next games")')->count());
        $this->assertEquals(0,$crawler->filter('h1:contains("Last games")')->count());
        $this->assertEquals(0,$crawler->filter('table')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());
        $this->assertRegExp('/There is no scheduled games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
        $this->assertNotRegExp('/There is no played games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
    }
  
    public function testNotExistGame() {
        self::createSchema();
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/game/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("Game")')->count());
        $this->assertEquals(1,$crawler->filter('div.alert')->count());       
        $this->assertRegExp('/There is no game with id 1 !!/',$crawler->filter('div.alert')->text());
    }

    public function testGamesNext() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/next');
        $this->assertEquals(1,$crawler->filter('h1:contains("Next games")')->count());
        $this->assertEquals(3,$crawler->filter('td')->count());
        $this->assertRegExp('/11-09-2014/',$crawler->filter('td')->eq(0)->text());
        $this->assertRegExp('/UE Castellnou7/',$crawler->filter('td')->eq(1)->text());
        $this->assertRegExp('/UE Castellnou1/',$crawler->filter('td')->eq(2)->text());
    }

    public function testGamesLast() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/last');
        $this->assertEquals(1,$crawler->filter('h1:contains("Last games")')->count());
        $this->assertEquals(15,$crawler->filter('td')->count());
        $this->assertRegExp('/09-11-2014/',$crawler->filter('td')->eq(0)->text());
        $this->assertRegExp('/17:14/',$crawler->filter('td')->eq(1)->text());
        $this->assertRegExp('/UE Castellnou1/',$crawler->filter('td')->eq(2)->text());
        $this->assertRegExp('/UE Castellnou2/',$crawler->filter('td')->eq(3)->text());
        $this->assertRegExp('/5 - 0/',$crawler->filter('td')->eq(4)->text()); 
        $this->assertRegExp('/09-11-2014/',$crawler->filter('td')->eq(5)->text());
        $this->assertRegExp('/17:14/',$crawler->filter('td')->eq(6)->text());
        $this->assertRegExp('/UE Castellnou3/',$crawler->filter('td')->eq(7)->text());
        $this->assertRegExp('/UE Castellnou4/',$crawler->filter('td')->eq(8)->text());
        $this->assertRegExp('/0 - 4/',$crawler->filter('td')->eq(9)->text());
        $this->assertRegExp('/09-11-2014/',$crawler->filter('td')->eq(10)->text());
        $this->assertRegExp('/17:14/',$crawler->filter('td')->eq(11)->text());
        $this->assertRegExp('/UE Castellnou5/',$crawler->filter('td')->eq(12)->text());
        $this->assertRegExp('/UE Castellnou6/',$crawler->filter('td')->eq(13)->text());
        $this->assertRegExp('/3 - 3/',$crawler->filter('td')->eq(14)->text());                  
    }

    public function testGamesAll() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games');
        $this->assertEquals(1,$crawler->filter('h1:contains("Next games")')->count());
        $this->assertEquals(1,$crawler->filter('h1:contains("Last games")')->count());        
        $this->assertEquals(18,$crawler->filter('td')->count());
        $this->assertRegExp('/11-09-2014/',$crawler->filter('td')->eq(0)->text());
        $this->assertRegExp('/UE Castellnou7/',$crawler->filter('td')->eq(1)->text());
        $this->assertRegExp('/UE Castellnou1/',$crawler->filter('td')->eq(2)->text());
        $this->assertRegExp('/09-11-2014/',$crawler->filter('td')->eq(3)->text());
        $this->assertRegExp('/17:14/',$crawler->filter('td')->eq(4)->text());
        $this->assertRegExp('/UE Castellnou1/',$crawler->filter('td')->eq(5)->text());
        $this->assertRegExp('/UE Castellnou2/',$crawler->filter('td')->eq(6)->text());
        $this->assertRegExp('/5 - 0/',$crawler->filter('td')->eq(7)->text()); 
        $this->assertRegExp('/09-11-2014/',$crawler->filter('td')->eq(8)->text());
        $this->assertRegExp('/17:14/',$crawler->filter('td')->eq(9)->text());
        $this->assertRegExp('/UE Castellnou3/',$crawler->filter('td')->eq(10)->text());
        $this->assertRegExp('/UE Castellnou4/',$crawler->filter('td')->eq(11)->text());
        $this->assertRegExp('/0 - 4/',$crawler->filter('td')->eq(12)->text());
        $this->assertRegExp('/09-11-2014/',$crawler->filter('td')->eq(13)->text());
        $this->assertRegExp('/17:14/',$crawler->filter('td')->eq(14)->text());
        $this->assertRegExp('/UE Castellnou5/',$crawler->filter('td')->eq(15)->text());
        $this->assertRegExp('/UE Castellnou6/',$crawler->filter('td')->eq(16)->text());
        $this->assertRegExp('/3 - 3/',$crawler->filter('td')->eq(17)->text());         
    }

    public function testGameNoLogos() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/game/1');
        $this->assertEquals(2,$crawler->filter('span.label')->count());
        $this->assertEquals('09-11-2014',$crawler->filter('span.label')->eq(0)->text());
        $this->assertEquals('17:14',$crawler->filter('span.label')->eq(1)->text());
        $this->assertEquals(1,$crawler->filter('div.col-md-1')->count());
        $this->assertEquals(2,$crawler->filter('div.col-md-3')->count());
        $this->assertEquals(3,$crawler->filter('h3.text-center')->count());
        $this->assertEquals('UE Castellnou1',$crawler->filter('h3.text-center')->eq(0)->text());
        $this->assertEquals('5 - 0',$crawler->filter('h3.text-center')->eq(1)->text());
        $this->assertEquals('UE Castellnou2',$crawler->filter('h3.text-center')->eq(2)->text());
    }

    public function testGameWithLogos() {
        self::createSchema();
        self::loadDataWithGames();
        $client = static::createClient();
        $crawler = $client->request('GET', '/games/game/3');
        $this->assertEquals(2,$crawler->filter('span.label')->count());
        $this->assertEquals('09-11-2014',$crawler->filter('span.label')->eq(0)->text());
        $this->assertEquals('17:14',$crawler->filter('span.label')->eq(1)->text());
        $this->assertEquals(3,$crawler->filter('div.col-md-1')->count());
        $this->assertEquals(2,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU5',$crawler->filter('img')->eq(0)->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->eq(0)->attr('src'));
        $this->assertEquals('CASTELLNOU6',$crawler->filter('img')->eq(1)->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->eq(1)->attr('src'));
        $this->assertEquals(2,$crawler->filter('div.col-md-3')->count());
        $this->assertEquals(3,$crawler->filter('h3.text-center')->count());
        $this->assertEquals('UE Castellnou5',$crawler->filter('h3.text-center')->eq(0)->text());
        $this->assertEquals('3 - 3',$crawler->filter('h3.text-center')->eq(1)->text());
        $this->assertEquals('UE Castellnou6',$crawler->filter('h3.text-center')->eq(2)->text());   
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
