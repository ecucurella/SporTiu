<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\DependencyInjection\ClassificationHelper;
use ecucurella\SporTiuBundle\Entity\League;
use Doctrine\DBAL\DBALException;
use PDOException;

class LeaguesController extends Controller
{
    public function indexAction()
    {
        try {
        	$leagues = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:League')->findAll();
            if (is_null($leagues)) {
                return $this->redirect($this->generateUrl('ecucurella_SporTiu_install'));
            } else {
                return $this->render('ecucurellaSporTiuBundle:Leagues:leagues.html.twig', 
                    array('leagues' => $leagues));
            }
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
    
    public function leagueAction($id)
    {
        try {
            $league = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:League')->find($id);
            //TODO: Buscar la última ronda
            $standings = null;
            $round = null;
            $round_id = null;
            if ($league) {
                $rounds = $league->getRounds();
                if (!$rounds->isEmpty()) {
                    $clHelper = new ClassificationHelper();
                    $round = $rounds->get(0);
                    $round_id = $round->getId();
                    $standings = $clHelper->getStandingsforClassificationRound($this->getDoctrine()->getManager(), $round);
                }
            }
            return $this->render('ecucurellaSporTiuBundle:Leagues:league.html.twig', 
                array('league' => $league, 'id' => $id, 
                      'standings' => $standings, 'round' => $round, 'round_id' => $round_id));

        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
}
