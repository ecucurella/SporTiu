<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class InstallControllerTest extends WebTestCase
{
    
    public function testIndex() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/install');
        $this->assertEquals(1,$crawler->filter('h1:contains("Install")')->count());
        $this->assertRegExp('/Installation required !!/',$crawler->filter('div.alert')->text());
    }

}
