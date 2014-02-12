<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesData;

class ClubsControllerTest extends WebTestCase
{

	/**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;

	/**
    * @var \ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesData
    */
    private $fixture;

    public function setUp()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
        $this->fixture = new LoadFixturesData();
        $this->fixture->load($this->em);
    }

    public function testIndex()
    {
    	//$this->loadFixtures(array('ecucurella\SporTiuBundle\Tests\Fixtures\LoadClubsData'));
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs');
        $this->assertTrue($crawler->filter('html:contains("Clubs")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("UE Castellnou")')->count() == 1);
        $this->assertTrue($crawler->filter('html:contains("CVF Monistrol")')->count() == 1);
        $this->assertTrue($crawler->filter('html:contains("CF Callús")')->count() == 1);    
    }

    protected function tearDown()
    {
        parent::tearDown();
        $this->fixture->unload($this->em);
        $this->em->close();
    }
}
