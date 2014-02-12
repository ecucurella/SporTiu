<?php

namespace ecucurella\SporTiuBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\DataFixtures\ORM\SporTiuSchema;
use Doctrine\ORM\EntityManager;

class SporTiuWebTestCase extends WebTestCase
{

	/**
    * @var \Doctrine\ORM\EntityManager
    */
    protected $em;

    public function setUp()
    {
        parent::setUp();
        static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
        SporTiuSchema::dropSchema($this->em);
        SporTiuSchema::generateSchema($this->em);
    }

    protected function tearDown()
    {
        SporTiuSchema::dropSchema($this->em);
        $this->em->close();
        parent::tearDown();
    }

}
