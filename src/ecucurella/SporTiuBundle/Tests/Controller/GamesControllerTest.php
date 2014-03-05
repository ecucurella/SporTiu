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
        $this->assertNoRegExp('/There is no scheduled games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
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
        $this->assertNoRegExp('/There is no played games in database yet !!/',$crawler->filter('div.alert')->eq(0)->text());
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
