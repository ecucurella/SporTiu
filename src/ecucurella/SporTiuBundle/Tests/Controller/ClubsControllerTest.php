<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use ecucurella\SporTiuBundle\Tests\Controller\SporTiuWebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesClubsData;

class ClubsControllerTest extends SporTiuWebTestCase
{

	/**
    * @var \ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesClubsData
    */
    protected $fixture;

    public function setUp()
    {
        parent::setUp();
        $this->fixture = new LoadFixturesClubsData();
        $this->fixture->load($this->em);
    }

    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs');
        $this->assertTrue($crawler->filter('html:contains("Clubs")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("UE Castellnou")')->count() == 1);
        $this->assertTrue($crawler->filter('html:contains("CVF Monistrol")')->count() == 1);
        $this->assertTrue($crawler->filter('html:contains("CF Callús")')->count() == 1);    
    }

    protected function tearDown()
    {
        $this->fixture->unload($this->em);
        parent::tearDown();
    }

}
