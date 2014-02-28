<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Game;
use Doctrine\DBAL\DBALException;
use PDOException;

class GamesController extends Controller
{
    public function indexAction()
    {
        try {
            return $this->render('ecucurellaSporTiuBundle:Games:games.html.twig');
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
    
    public function gameAction($id)
    {
        try {
            return $this->render('ecucurellaSporTiuBundle:Games:game.html.twig',array('id' => $id ));
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }

    public function nextAction()
    {
        try {
            $games = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findNextGames();
            return $this->render('ecucurellaSporTiuBundle:Games:next.html.twig', array('games' => $games));
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }

    public function lastAction()
    {
        try {
            $games = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findLastGames();
            return $this->render('ecucurellaSporTiuBundle:Games:last.html.twig', array('games' => $games));
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
}
