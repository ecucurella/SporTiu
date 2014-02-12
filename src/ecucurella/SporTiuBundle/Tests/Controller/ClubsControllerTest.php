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

    public function testClubs()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs');
        $this->assertEquals(1,$crawler->filter('h1:contains("Clubs")')->count());
        $this->assertEquals(7,$crawler->filter('h3')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou1")')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou2")')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou3")')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou4")')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou5")')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou6")')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou7")')->count());
    }

    public function testClubAll()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/7');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou7")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU7',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(5,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $this->assertRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$crawler->filter('p')->eq(3)->text());
        $this->assertRegExp('/veteranscastellnou@gmail.com/',$crawler->filter('p')->eq(4)->text());
    }

    public function testClubWithoutWebSite()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/6');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou6")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU6',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(4,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $this->assertRegExp('/veteranscastellnou@gmail.com/',$crawler->filter('p')->eq(3)->text());
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$crawler->filter('html')->text());
    }

    public function testClubWithoutEmail()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/5');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou5")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU5',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(3,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
    }

    /*public function testClubWithoutAlternativeColors()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/4');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou4")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU4',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(2,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
    }*/

    /*public function testClubWithoutColors()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/3');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou3")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU3',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(1,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
        $this->assertNotRegExp('/Samarreta verda, pantalons negres/',$text);
    }*/

    protected function tearDown()
    {
        $this->fixture->unload($this->em);
        parent::tearDown();
    }

}
