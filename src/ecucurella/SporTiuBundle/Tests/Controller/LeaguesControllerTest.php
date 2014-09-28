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
