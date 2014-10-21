<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use Doctrine\ORM\EntityManager;

class InstallControllerTest extends WebTestCase
{
    
    public function testIndex() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'sportiu',
        ));
        $crawler = $client->request('GET', '/install');
        $this->assertEquals(1,$crawler->filter('h1:contains("Install")')->count());
        $this->assertRegExp('/Installation required !!/',$crawler->filter('div.alert')->text());
    	$this->assertRegExp('/Install/',$crawler->filter('button.btn')->text());
    }

    public function testInstall() {
        $client = static::createClient(array(), array(
            'PHP_AUTH_USER' => 'admin',
            'PHP_AUTH_PW'   => 'sportiu',
        ));
        $crawler = $client->request('GET', '/install');
        $link = $crawler->selectLink('Install')->link();
        $crawler = $client->click($link);
        $this->assertEquals(1,$crawler->filter('h1:contains("Install")')->count());
        $this->assertRegExp('/Installation successfull !!/',$crawler->filter('div.alert')->text());
        $this->assertRegExp('/Go to Homepage/',$crawler->filter('button.btn')->text());
    }

    protected function tearDown()
    {
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $em = static::$kernel->getContainer()->get('doctrine')->getManager();
        if (!is_null($em)) {
            SporTiuSchema::dropSchema($em);
            $em->close();
        }
        parent::tearDown();
    }

}
