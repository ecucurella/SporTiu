<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Club;

class ClubsController extends Controller
{
    public function indexAction()
    {
    	$clubs = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Club')->findAll();
        return $this->render('ecucurellaSporTiuBundle:Clubs:clubs.html.twig', array('clubs' => $clubs));
    }
    
    public function clubAction($id)
    {
    	$club = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Club')->find($id);
        return $this->render('ecucurellaSporTiuBundle:Clubs:club.html.twig', array('club' => $club));
    }
}
