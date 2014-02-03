<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ecucurellaSporTiuBundle:Default:index.html.twig', array('name' => $name));
    }
}
