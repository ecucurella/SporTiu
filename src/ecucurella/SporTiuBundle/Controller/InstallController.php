<?php

namespace ecucurella\SporTiuBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Club;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesData;
use Doctrine\DBAL\DBALException;
use PDOException;

class InstallController extends Controller
{
    /**
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function indexAction() {
        return $this->render('ecucurellaSporTiuBundle:Install:install.html.twig');
    }

    /**
    * @Security("has_role('ROLE_ADMIN')")
    */
    public function createSchemaAction() {
        //TODO: Create database if no exist
        //TODO: Alert if any problem
        try {
            $em = $this->getDoctrine()->getManager();
            SporTiuSchema::dropSchema($em);
            SporTiuSchema::createSchema($em);
            $fixture = new LoadFixturesData();
            $fixture->load($em);
            return $this->render('ecucurellaSporTiuBundle:Install:schema.html.twig', array('error' => false));
        } catch (DBALException $dbal_e) {
            return $this->render('ecucurellaSporTiuBundle:Install:schema.html.twig', 
                array(
                    'error' => 'DBALException: ' . $dbal_e->getMessage()
                ));  
        } catch (PDOException $pdo_e) {
            return $this->render('ecucurellaSporTiuBundle:Install:schema.html.twig', 
                array(
                    'error' => 'PDOException: ' . $pdo_e->getMessage()
                ));
        }
    }
}