<?php

namespace ecucurella\SporTiuBundle\Tests\DataFixtures\ORM;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ecucurella\SporTiuBundle\Tests\DataFixtures\ORM\LoadFixturesClubsData;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DBALException;
use PDOException;

class SporTiuSchemaTest extends WebTestCase 
{
	/**
    * @var \Doctrine\ORM\EntityManager
    */
    protected $em;

	public function setUp() {
		parent::setUp();
		static::$kernel = static::createKernel();
        static::$kernel->boot();
        $this->em = static::$kernel->getContainer()->get('doctrine')->getManager();
	}

	public function testCreateAndDropSchema() {

      	try {
        	$clubs = $this->em->getRepository('ecucurellaSporTiuBundle:Club')->findAll();
			$this->fail('Club Entity can not exist before test createSchema !! ');
        } catch (DBALException $dbal_e) {
        	SporTiuSchema::createSchema($this->em);
        	$clubs = $this->em->getRepository('ecucurellaSporTiuBundle:Club')->findAll();	
        	$this->assertEquals(0,count($clubs));
        	$fixture = new LoadFixturesClubsData();
        	$fixture->load($this->em); 
        	$clubs = $this->em->getRepository('ecucurellaSporTiuBundle:Club')->findAll();	
        	$this->assertEquals(7,count($clubs));
        	$fixture->unload($this->em);
        	$clubs = $this->em->getRepository('ecucurellaSporTiuBundle:Club')->findAll();	
        	$this->assertEquals(0,count($clubs));
        	SporTiuSchema::dropSchema($this->em);
        	try {
        		$clubs = $this->em->getRepository('ecucurellaSporTiuBundle:Club')->findAll();
				$this->fail('Club Entity can not exist before test createSchema !! ');
        	} catch (DBALException $dbal_e) {
        		//Succesfull !!
        	} catch (PDOException $pdo_e) {
           		$this->fail('Database SporTiu_test must exit in order to test !!');
        	} catch (Exception $e) {
           		$this->fail('An unexpected exception has been raised');
        	}
        } catch (PDOException $pdo_e) {
           	$this->fail('Database SporTiu_test must exit in order to test !!');
        } catch (Exception $e) {
           	$this->fail('An unexpected exception has been raised');
        }
	}

	protected function tearDown()
    {
        if (!is_null($this->em)) {
            SporTiuSchema::dropSchema($this->em);
            $this->em->close();
        }
        parent::tearDown();
    }

}