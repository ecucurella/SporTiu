<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Club;
use ecucurella\SporTiuBundle\DataFixtures\SporTiuSchema;
use ecucurella\SporTiuBundle\DataFixtures\ORM\LoadFixturesData;

class InstallController extends Controller
{
    public function indexAction() {
        return $this->render('ecucurellaSporTiuBundle:Install:install.html.twig');
    }

    public function createSchemaAction() {
        //TODO: Create database if no exist
        //TODO: Alert if any problem
        $em = $this->getDoctrine()->getManager();
        SporTiuSchema::dropSchema($em);
        SporTiuSchema::createSchema($em);
        $fixture = new LoadFixturesData();
        $fixture->load($em);
        return $this->render('ecucurellaSporTiuBundle:Install:schema.html.twig');
    }
}