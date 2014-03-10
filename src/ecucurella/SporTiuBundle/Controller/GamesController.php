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
            $nextgames = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findNextGames();
            $lastgames = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findLastGames();
            return $this->render('ecucurellaSporTiuBundle:Games:games.html.twig', 
                array('nextgames' => $nextgames, 'lastgames' => $lastgames));
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
    
    public function gameAction($id)
    {
        try {
            $game = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->find($id);
            if (!$game) {
                return $this->render('ecucurellaSporTiuBundle:Games:game.html.twig', 
                    array(
                        'game' => $game, 
                        'empty' => true, 
                        'id' => $id 
                        ));
            } else {
                return $this->render('ecucurellaSporTiuBundle:Games:game.html.twig', 
                    array(
                        'game' => $game, 
                        'empty' => false, 
                        'id' => $id,
                        'played' => ( $game->getGamestate() == 'PLAYED' ),
                        'suspended' => ( $game->getGamestate() == 'SUSPENDED' ),
                        'calendar' => ( $game->getGamestate() == 'CALENDAR' ),
                        'scheduled' => ( $game->getGamestate() == 'SCHEDULED' )
                        ));
            }
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }

    public function nextAction()
    {
        try {
            $nextgames = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findNextGames();
            return $this->render('ecucurellaSporTiuBundle:Games:next.html.twig', array('nextgames' => $nextgames));
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }

    public function lastAction()
    {
        try {
            $lastgames = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Game')->findLastGames();
            return $this->render('ecucurellaSporTiuBundle:Games:last.html.twig', array('lastgames' => $lastgames));
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
}
