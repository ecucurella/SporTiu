<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ClubsControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs');
        $this->assertTrue($crawler->filter('html:contains("Clubs")')->count() > 0);
        $this->assertTrue($crawler->filter('html:contains("FCB Castellnou")')->count() == 1);
        $this->assertTrue($crawler->filter('html:contains("CVF Monistrol")')->count() == 1);
        $this->assertTrue($crawler->filter('html:contains("CF Callús")')->count() == 1);    
    }
}
