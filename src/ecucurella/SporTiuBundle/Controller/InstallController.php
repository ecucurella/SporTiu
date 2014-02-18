<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Club;

class InstallController extends Controller
{
    public function indexAction() {
        return $this->render('ecucurellaSporTiuBundle:Install:install.html.twig');
    }
}