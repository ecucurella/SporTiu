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

        $em = $this->getDoctrine()->getManager();
        //League
        $league = $em->getRepository('ecucurellaSporTiuBundle:League')->find($leagueid);
        //TODO: Tractar que la Lliga no existeixi
        $clubs = $league->getClubs();
        //TODO: Tractar que clubs no estigui buit
        $rounds = $em->getRepository('ecucurellaSporTiuBundle:Round')->findRoundsByLeague($league);
        //TODO: Tractar que rounds no estigui buit
        
        $game = new Game();
        $game->setLocalpoints(0);
        $game->setVisitorpoints(0);
        $game->setGamedate(new DateTime('next sunday'));
        $game->setGamestate('CALENDAR');

        $form = $this->createFormBuilder($game)
            ->add('localclub', 'entity', array(
                    'class'     => 'ecucurellaSporTiuBundle:Club',
                    'property'  => 'abbreviation',
                    'choices'   => $clubs,
                    'label'     => 'Local',
                    'placeholder' => 'Choose a Club ...'))
            ->add('visitorclub', 'entity', array(
                    'class'     => 'ecucurellaSporTiuBundle:Club',
                    'property'  => 'abbreviation',
                    'choices'   => $clubs,
                    'label'     => 'Visitor',
                    'placeholder' => 'Choose a Club ...'))            
            ->add('localpoints', 'number', array('label' => 'Local points'))
            ->add('visitorpoints','number', array('label' => 'Visitor points'))
            ->add('gamedate', 'collot_datetime', array( 'pickerOptions' =>
                array('format' => 'dd/mm/yyyy hh:ii',
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
                    'label'     => 'State',
                    'placeholder' => 'Choose a state ...'))
            ->add('round', 'entity', array(
                    'class'     => 'ecucurellaSporTiuBundle:Round',
                    'property'  => 'name',
                    'choices'   => $rounds,
                    'label'     => 'Round',
                    'placeholder' => 'Choose a Round ...'))            
            ->add('save', 'submit', array('label' => 'Save'))
            ->add('saveAndAdd', 'submit', array('label' => 'Save and add'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $thisGameHasBeenAdded = $this->isGameAdded($game, $em);
            $clubHasBeenAdded = $this->isClubForThisRoundAdded($game, $em);
            if ($thisGameHasBeenAdded === true && $clubHasBeenAdded === true) {
                $em->persist($game);
                $em->flush();
                $this->deleteFutureStandingsAndClassification($em,$game);
                if ($form->get('saveAndAdd')->isClicked()) {
                    return $this->render('ecucurellaSporTiuBundle:Games:addgame.html.twig', array(
                        'form'  => $form->createView(), 'added' => $game ));
                } else {
                    return $this->redirect($this->generateUrl('ecucurella_SporTiu_games_id', array('id' => $game->getId())));
                }  
            } else {
                if ($thisGameHasBeenAdded !== true) {
                    return $this->render('ecucurellaSporTiuBundle:Games:addgame.html.twig', array(
                        'form'  => $form->createView(), 'gameadded' => $thisGameHasBeenAdded ));                
                } elseif ($clubHasBeenAdded !== true) {
                    return $this->render('ecucurellaSporTiuBundle:Games:addgame.html.twig', array(
                        'form'  => $form->createView(), 'clubadded' => $clubHasBeenAdded ));                
                }
            }
        } else {
            return $this->render('ecucurellaSporTiuBundle:Games:addgame.html.twig', array(
                'form'  => $form->createView()));
        }

    }

    private function isGameAdded($game, $em) {
        //Check that this game:
        //  * has not been played before in same league
        $oldgame = $em->getRepository('ecucurellaSporTiuBundle:Game')
            ->findGameByLeagueAndClubs($game->getRound()->getLeague(), 
                $game->getLocalClub(), $game->getVisitorClub());
        if (empty($oldgame)) {
            return true;
        } else {
            return $oldgame[0];            
        }
    }

    private function isClubForThisRoundAdded($game, $em) {
        //Check that local and visitor club:
        //  * has not been played in other game in same league and round
        //CheckFirstLocal then Visitor
        $round = $game->getRound();
        $league = $round->getLeague();
        $oldgame = $em->getRepository('ecucurellaSporTiuBundle:Game')
            ->findGameByLeagueAndRoundAndClub($league, $round, $game->getLocalClub());
        if (empty($oldgame)) {
            $oldgame = $em->getRepository('ecucurellaSporTiuBundle:Game')
                ->findGameByLeagueAndRoundAndClub($league, $round, $game->getVisitorClub());
            if (empty($oldgame)) {
                return true;
            } else {
                return $oldgame[0];            
            }
        } else {
            return $oldgame[0];            
        }
    }

    public function editAction($gameid, Request $request) 
    {

        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('ecucurellaSporTiuBundle:Game')->find($gameid);

        $form = $this->createFormBuilder($game)
            ->add('localclub', 'text', array(
                'data' => $game->getLocalClub()->getAbbreviation(),
                'disabled' => true))
            ->add('visitorclub', 'text', array(
                'data' => $game->getVisitorClub()->getAbbreviation(),
                'disabled' => true))
            ->add('localpoints', 'number', array('label' => 'Local points'))
            ->add('visitorpoints','number', array('label' => 'Visitor points'))
            ->add('gamedate', 'collot_datetime', array( 'pickerOptions' =>
                array('format' => 'dd/mm/yyyy hh:ii',
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
                    'label'     => 'State',
                    'placeholder' => 'Choose a state ...'))
            ->add('round', 'text', array(
                'data' => $game->getRound()->getName(),
                'disabled' => true))            
            ->add('save', 'submit', array('label' => 'Save'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $game->setStandingcount("0");
            $em->persist($game);
            $em->flush();
            $this->deleteFutureStandingsAndClassification($em,$game);
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_games_id', array('id' => $game->getId())));
        } else {
            return $this->render('ecucurellaSporTiuBundle:Games:editgame.html.twig', array(
                'form' => $form->createView()));
        }

    }

    public function deleteAction($gameid) 
    {
        $em = $this->getDoctrine()->getManager();
        $game = $em->getRepository('ecucurellaSporTiuBundle:Game')->find($gameid);
        $gameid = $game->getId();
        $this->deleteFutureStandingsAndClassification($em,$game);
        $em->remove($game);
        $em->flush();
        return $this->render('ecucurellaSporTiuBundle:Games:deletegame.html.twig',
            array('gameid' => $gameid));
    }

    private function deleteFutureStandingsAndClassification($em,Game $game) {
        $rounds = $em->getRepository('ecucurellaSporTiuBundle:Round')
           ->findAllRoundsPlayedAfterOneRoundByLeague($game->getRound());
        foreach ($rounds as $round) {
            $classification = $round->getClassification();
            $standingsDeleted = $em->getRepository('ecucurellaSporTiuBundle:Standing')
                ->deleteStandingByClassification($classification);
            $roundsDeleted = $em->getRepository('ecucurellaSporTiuBundle:Classification')
                ->deleteClassificationByRound($round);
            $gamesUpdated = $em->getRepository('ecucurellaSporTiuBundle:Game')
                ->updateGamesStandingCountByRound($round);
        }
    }

}
