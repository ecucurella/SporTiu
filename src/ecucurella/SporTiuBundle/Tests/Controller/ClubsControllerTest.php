<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use ecucurella\SporTiuBundle\Tests\Controller\SporTiuWebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesClubsData;

class ClubsControllerTest extends SporTiuWebTestCase
{

    protected function loadData() {
        $fixture = new LoadFixturesClubsData();
        $fixture->load($this->em);   
    }

    public function testClubs() {
        self::loadData();
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

    public function testClubsLink() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs');
        $this->assertEquals(1,$crawler->filter('h1:contains("Clubs")')->count());
        $this->assertEquals(7,$crawler->filter('h3')->count());
        $this->assertEquals(1,$crawler->filter('h3:contains("UE Castellnou7")')->count());
        $link = $crawler->selectLink('UE Castellnou7')->link();
        $crawler = $client->click($link);
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou7")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU7',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(5,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $this->assertRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$crawler->filter('p')->eq(3)->text());
        $this->assertRegExp('/veteranscastellnou@gmail.com/',$crawler->filter('p')->eq(4)->text());
    }

    public function testClubAll() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/7');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou7")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU7',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(5,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $this->assertRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$crawler->filter('p')->eq(3)->text());
        $this->assertRegExp('/veteranscastellnou@gmail.com/',$crawler->filter('p')->eq(4)->text());
    }

    public function testClubWithoutWebSite() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/6');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou6")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU6',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(4,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $this->assertRegExp('/veteranscastellnou@gmail.com/',$crawler->filter('p')->eq(3)->text());
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$crawler->filter('html')->text());
    }

    public function testClubWithoutEmail() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/5');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou5")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU5',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(3,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $this->assertRegExp('/Samarreta groga, pantalons blaus/',$crawler->filter('p')->eq(2)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        //var_dump($text);
    }

    public function testClubWithoutAlternativeColors() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/4');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou4")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU4',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(2,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $this->assertRegExp('/Samarreta verda, pantalons negres/',$crawler->filter('p')->eq(1)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
        //var_dump($text);
    }

    public function testClubWithoutColors() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/3');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou3")')->count());
        $this->assertEquals(1,$crawler->filter('img')->count());
        $this->assertEquals('CASTELLNOU3',$crawler->filter('img')->attr('alt'));
        $this->assertEquals('http://veteranscastellnou.files.wordpress.com/2013/09/castellnou.png',$crawler->filter('img')->attr('src'));
        $this->assertEquals(1,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
        $this->assertNotRegExp('/Samarreta verda, pantalons negres/',$text);
        //var_dump($text);
    }

    public function testClubWithoutLogo() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/2');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou2")')->count());
        $this->assertEquals(0,$crawler->filter('img')->count());
        $this->assertEquals(1,$crawler->filter('p')->count());
        $this->assertRegExp('/2010/',$crawler->filter('p')->eq(0)->text());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
        $this->assertNotRegExp('/Samarreta verda, pantalons negres/',$text);
        //var_dump($text);
    }

    public function testClubWithoutCreationYear() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/1');
        $this->assertEquals(1,$crawler->filter('h1:contains("UE Castellnou1")')->count());
        $this->assertEquals(0,$crawler->filter('img')->count());
        $this->assertEquals(0,$crawler->filter('p')->count());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
        $this->assertNotRegExp('/Samarreta verda, pantalons negres/',$text);
        $this->assertNotRegExp('/2010/',$text);
        //var_dump($text);
    }

    public function testNoClubs() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs');
        $this->assertEquals(1,$crawler->filter('h1:contains("Clubs")')->count());
        $this->assertEquals(0,$crawler->filter('h3')->count());
        $this->assertRegExp('/There is no Clubs in database yet !!/',$crawler->filter('div.alert')->text());
    }

    public function testClubNotExist() {
        self::loadData();
        $client = static::createClient();
        $crawler = $client->request('GET', '/clubs/club/XXX');
        $this->assertEquals(1,$crawler->filter('h1:contains("Club")')->count());
        $this->assertEquals(0,$crawler->filter('img')->count());
        $this->assertEquals(0,$crawler->filter('p')->count());
        $text = $crawler->filter('html')->text();
        $this->assertNotRegExp('/http:\/\/veteranscastellnou.wordpress.com/',$text);
        $this->assertNotRegExp('/veteranscastellnou@gmail.com/',$text);
        $this->assertNotRegExp('/Samarreta groga, pantalons blaus/',$text);
        $this->assertNotRegExp('/Samarreta verda, pantalons negres/',$text);
        $this->assertNotRegExp('/2010/',$text);
        $this->assertRegExp('/There is no Club with id XXX !!/',$crawler->filter('div.alert')->text());
    }

    protected function tearDown()
    {
        $fixture = new LoadFixturesClubsData();
        $fixture->unload($this->em);
        parent::tearDown();
    }

}
