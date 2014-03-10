<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Club;
use Doctrine\DBAL\DBALException;
use PDOException;

class ClubsController extends Controller
{
    public function indexAction()
    {
        try {
        	$clubs = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Club')->findAll();
            if (is_null($clubs)) {
                return $this->redirect($this->generateUrl('ecucurella_SporTiu_install'));
            } else {
                return $this->render('ecucurellaSporTiuBundle:Clubs:clubs.html.twig', array('clubs' => $clubs));
            }
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
    
    public function clubAction($id)
    {
        try {
            $club = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Club')->find($id);
            if (!$club) {
                return $this->render('ecucurellaSporTiuBundle:Clubs:club.html.twig', 
                    array('club' => $club, 'empty' => true, 'id' => $id, 
                        'nextgames' => false, 'lastgames' => false ));
            } else {
                $nextgames = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findNextGamesbyClub($club);
                $lastgames = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findLastGamesbyClub($club);
                return $this->render('ecucurellaSporTiuBundle:Clubs:club.html.twig', 
                    array('club' => $club, 'empty' => false, 'id' => $id,
                        'nextgames' => $nextgames, 'lastgames' => $lastgames));
            }
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }

    }
}
