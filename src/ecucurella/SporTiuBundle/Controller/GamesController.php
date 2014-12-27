<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Game;
use Doctrine\DBAL\DBALException;
use PDOException;
use DateTime;
use Symfony\Component\HttpFoundation\Request;

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

    public function addAction($leagueid, Request $request) 
    {

        //em
        $em = $this->getDoctrine()->getManager();
        //League
        $league = $em->getRepository('ecucurellaSporTiuBundle:League')->find($leagueid);
        //TODO: Tractar que la Lliga no existeixi
        $clubs = $league->getClubs();
        //TODO: Tractar que clubs no estigui buit
        $rounds = $em->getRepository('ecucurellaSporTiuBundle:Round')->findRoundsByLeague($league);
        //TODO: Tractar que rounds estigui buit
        
        $game = new Game();
        $game->setLocalpoints(0);
        $game->setVisitorpoints(0);
        $game->setGamedate(new DateTime('tomorrow'));
        $game->setGamestate('CALENDAR');

        $form = $this->createFormBuilder($game)
            ->add('localclub', 'entity', array(
                    'class'     => 'ecucurellaSporTiuBundle:Club',
                    'property'  => 'name',
                    'choices'   => $clubs,
                    'label'     => 'Local'))
            ->add('visitorclub', 'entity', array(
                    'class'     => 'ecucurellaSporTiuBundle:Club',
                    'property'  => 'name',
                    'choices'   => $clubs,
                    'label'     => 'Visitor'))            
            ->add('localpoints', 'number')
            ->add('visitorpoints','number')
            ->add('gamedate', 'collot_datetime', array( 'pickerOptions' =>
                array('format' => 'dd/mm/yyyy HH:ii',
                    'weekStart' => 1,
                    'daysOfWeekDisabled' => '1,2,3,4,5', 
                    'autoclose' => true,
                    'startView' => 'month',
                    'minView' => 'hour',
                    'maxView' => 'decade',
                    'todayBtn' => true,
                    'todayHighlight' => true,
                    'keyboardNavigation' => true,
                    'language' => 'esp',
                    'forceParse' => true,
                    'minuteStep' => 15,
                    'pickerReferer ' => 'default',
                    'pickerPosition' => 'bottom-right',
                    'viewSelect' => 'hour',
                    'showMeridian' => false,
                    ))) 
            ->add('gamestate','choice', array(
                    'choices'   => array(
                        'CALENDAR'  => 'Calendar', 
                        'SCHEDULED' => 'Scheduled',
                        'SUSPENDED' => 'Suspended',
                        'PLAYED'    => 'Played'),
                    'label'     => 'State'))
            ->add('round', 'entity', array(
                    'class'     => 'ecucurellaSporTiuBundle:Round',
                    'property'  => 'name',
                    'choices'   => $rounds,
                    'label'     => 'Round'))            
            ->add('save', 'submit', array('label' => 'Create'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em->persist($game);
            $em->flush();        
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_games'));
        } else {
            return $this->render('ecucurellaSporTiuBundle:Games:addgame.html.twig', array(
                'form' => $form->createView()));
        }

    }
}
