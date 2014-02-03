<?php

namespace ecucurella\AssetsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ecucurellaAssetsBundle:Default:index.html.twig', array('name' => $name));
    }
}
