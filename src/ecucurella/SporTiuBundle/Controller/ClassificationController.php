<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\Entity\Round;
use ecucurella\SporTiuBundle\Entity\Classification;
use ecucurella\SporTiuBundle\Entity\Standing;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\DBAL\DBALException;
use PDOException;
use DateTime;

class ClassificationController extends Controller
{
    public function indexAction()
    {
        try {
        	/*$leagues = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:League')->findAll();
            if (is_null($leagues)) {
                return $this->redirect($this->generateUrl('ecucurella_SporTiu_install'));
            } else {
                return $this->render('ecucurellaSporTiuBundle:Leagues:leagues.html.twig', 
                    array('leagues' => $leagues));
            }*/
        } catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }
    }
    
    public function roundAction($round_id)
    {
        //try {
            $round = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Round')->find($round_id);
            if (!$round) {
                return $this->render('ecucurellaSporTiuBundle:Classification:round.html.twig', 
                    array('round' => $round, 'empty' => true, 'round_id' => $round_id));
            } else {
                //Assume that if there is no classification, there are no standings
                $classification = $round->getClassification();
                if (!$classification) {
                    $classification = self::createClassification($this->getDoctrine()->getManager(), $round);
                    $standings = self::orderClassification($this->getDoctrine()->getManager(), $classification);
                } else {
                    $standings = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Standing')
                        ->findStandingsByClassification($classification);
                }
                return $this->render('ecucurellaSporTiuBundle:Classification:round.html.twig', 
                    array('round' => $round, 'empty' => false, 'round_id' => $round_id, 
                          'standings' => $standings));
            }
        /*} catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }*/
    }

    private function createClassification(ObjectManager $manager, Round $round) {
        
        //Before creating Classification for this round
        //We must create Classification for all rounds before it if not exist
        if ($round->getOrdernum() > 1) {
            $league = $round->getLeague();
            $previousOrdernum = $round->getOrdernum() - 1;
            $previousRound = $manager->getRepository('ecucurellaSporTiuBundle:Round')
                ->findOneBy(array('ordernum' =>  $previousOrdernum, 'league' => $league));
            $previousClassification = $previousRound->getClassification();
            if (!$previousClassification) {
                $previousClassification = self::createClassification($manager, $previousRound);
                $previousStandings = self::orderClassification($manager, $previousClassification);
            }
        }

        //Now that previous Classification have been created
        //We can create our Classification
        $classification = new Classification();
        $classification->setGenerationdate(new DateTime());
        $classification->setRound($round);
        $games = $round->getGames();
        foreach ($games as $game) {
            $classification = self::createStanding($manager, $game, $classification);
        }
        $manager->persist($classification);
        $manager->flush();
        return $classification;
    }

    private function createStanding(ObjectManager $manager, $game, $classification) {
        
        //New objects
        $standingLocal = new Standing();
        $standingVisitor = new Standing();
        
        //club and classification
        $standingLocal = $standingLocal->setClub($game->getLocalclub());
        $standingVisitor = $standingVisitor->setClub($game->getVisitorclub());
        $standingLocal = $standingLocal->setClassification($classification);
        $standingVisitor = $standingVisitor->setClassification($classification);
        
        //position
        $standingLocal->setPosition($standingLocal->getPosition());
        $standingVisitor->setPosition($standingVisitor->getPosition());
        
        //Search standing for Clubs in last classification if not first one
        if ($classification->getRound()->getOrdernum() > 1) {
            //Get Last Classification
            $league = $classification->getRound()->getLeague();
            $previousOrdernum = $classification->getRound()->getOrdernum() - 1;
            $previousRound = $manager->getRepository('ecucurellaSporTiuBundle:Round')
                ->findOneBy(array('ordernum' =>  $previousOrdernum, 'league' => $league));
            $lastStandingLocal = $manager->getRepository('ecucurellaSporTiuBundle:Standing')
                ->findStandingByClassificationAndClub($previousRound->getClassification(), $game->getLocalclub());
            $lastStandingVisitor = $manager->getRepository('ecucurellaSporTiuBundle:Standing')
                ->findStandingByClassificationAndClub($previousRound->getClassification(), $game->getVisitorclub());

            //Local
            $standingLocal->setGameswin($lastStandingLocal[0]->getGameswin());
            $standingLocal->setGamesdefeat($lastStandingLocal[0]->getGamesdefeat());
            $standingLocal->setGamesdraw($lastStandingLocal[0]->getGamesdraw());
            $standingLocal->setPoints($lastStandingLocal[0]->getPoints());
            $standingLocal->setGoalsfavorables($lastStandingLocal[0]->getGoalsfavorables());
            $standingLocal->setGoalsagainst($lastStandingLocal[0]->getGoalsagainst());
            $standingLocal->setGamesplayed($lastStandingLocal[0]->getGamesplayed());

            //Visitor
            $standingVisitor->setGameswin($lastStandingVisitor[0]->getGameswin());
            $standingVisitor->setGamesdefeat($lastStandingVisitor[0]->getGamesdefeat());
            $standingVisitor->setGamesdraw($lastStandingVisitor[0]->getGamesdraw());
            $standingVisitor->setPoints($lastStandingVisitor[0]->getPoints());
            $standingVisitor->setGoalsfavorables($lastStandingVisitor[0]->getGoalsfavorables());
            $standingVisitor->setGoalsagainst($lastStandingVisitor[0]->getGoalsagainst());
            $standingVisitor->setGamesplayed($lastStandingVisitor[0]->getGamesplayed());
        }
        
        //win defeat draw points
        if ($game->getLocalpoints() > $game->getVisitorpoints()) {
            //Local Wins
            $standingLocal->setGameswin($standingLocal->getGameswin()+1);
            $standingLocal->setPoints($standingLocal->getPoints()+3);
            //Visitor Defeat
            $standingVisitor->setGamesdefeat($standingVisitor->getGamesdefeat()+1);
        } elseif ($game->getLocalpoints() < $game->getVisitorpoints()) {
            //Local Defeat
            $standingLocal->setGamesdefeat($standingLocal->getGamesdefeat()+1);
            //Visitor Wins
            $standingVisitor->setGameswin($standingVisitor->getGameswin()+1);
            $standingVisitor->setPoints($standingVisitor->getPoints()+3);

        } elseif ($game->getLocalpoints() == $game->getVisitorpoints()) {
            //Local Draws
            $standingLocal->setGamesdraw($standingLocal->getGamesdraw()+1);
            $standingLocal->setPoints($standingLocal->getPoints()+1);
            //Visitor Draws
            $standingVisitor->setGamesdraw($standingVisitor->getGamesdraw()+1);
            $standingVisitor->setPoints($standingVisitor->getPoints()+1);
        }

        //played
        $standingLocal->setGamesplayed($standingLocal->getGamesplayed()+1);
        $standingVisitor->setGamesplayed($standingVisitor->getGamesplayed()+1);

        //goals favorable against difference Local
        $standingLocal->setGoalsfavorables($standingLocal->getGoalsfavorables() + $game->getLocalpoints());
        $standingLocal->setGoalsagainst($standingLocal->getGoalsagainst() + $game->getVisitorpoints());
        $standingLocal->setGoalsdifference($standingLocal->getGoalsfavorables() - $standingLocal->getGoalsagainst());
        
        //goals favorable against difference Visitor
        $standingVisitor->setGoalsfavorables($standingVisitor->getGoalsfavorables() + $game->getVisitorpoints());
        $standingVisitor->setGoalsagainst($standingVisitor->getGoalsagainst() + $game->getLocalpoints());
        $standingVisitor->setGoalsdifference($standingVisitor->getGoalsfavorables() - $standingVisitor->getGoalsagainst());
        
        //add standings to classification
        $classification = $classification->addStanding($standingLocal);
        $classification = $classification->addStanding($standingVisitor);
        
        //persist standing
        $manager->persist($standingLocal);
        $manager->persist($standingVisitor);
        
        //return classification
        return $classification;
    }

    private function orderClassification(ObjectManager $manager, $classification) {
        $standings = $manager->getRepository('ecucurellaSporTiuBundle:Standing')
            ->findStandingsByClassification($classification);
        $position = 1;
        foreach ($standings as $standing) {
            $standing->setPosition($position);
            $position += 1;
            $manager->persist($standing);
        }
        $manager->flush();
        return $standings;
    }

}
