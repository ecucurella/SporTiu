<?php

namespace ecucurella\SporTiuBundle\DependencyInjection;

use ecucurella\SporTiuBundle\Entity\Round;
use ecucurella\SporTiuBundle\Entity\Classification;
use ecucurella\SporTiuBundle\Entity\Standing;
use ecucurella\SporTiuBundle\Entity\League;
use ecucurella\SporTiuBundle\Entity\Game;
use Doctrine\Common\Persistence\ObjectManager;
use DateTime;

class ClassificationHelper
{

    public function setRoundsPlayedToPlayed(ObjectManager $manager, League $league) {
        $rounds = $league->getRounds();
        foreach ($rounds as $round) {
            $games = $round->getGames();
            foreach ($games as $game) {
                if ($game->getGamestate() == 'PLAYED') {
                    $round->setRoundplayed(true);
                    $manager->persist($round);
                    break;
                }
            }
        }
        $manager->flush();
    }
    
    public function getStandingsforClassificationRound(ObjectManager $manager, Round $round) {
        //Assume that if there is no classification, there are no standings
        $classification = $round->getClassification();
        if (!$classification) {
            $classification = self::createClassification($manager, $round);
            if ($classification) { 
                $classification = self::orderClassification($manager, $classification); 
            }
        } 
        $standings = $manager->getRepository('ecucurellaSporTiuBundle:Standing')
            ->findStandingsByClassification($classification);
        return $standings;
    }

    public function createClassification(ObjectManager $manager, Round $round) {

        //First check if there are at least one game played
        $games = $round->getGames();
        $atleastonegameplayed = false;
        foreach ($games as $game) {
            if ($game->getGamestate() == 'PLAYED') { 
                $atleastonegameplayed = true; 
                break;
            }
        }

        if ($atleastonegameplayed) {
            
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
                    if ($previousClassification) { 
                        $previousClassification = self::orderClassification($manager, $previousClassification); 
                    }
                }
            }

            //Now that previous Classification have been created
            //We can create our Classification
            $classification = new Classification();
            $classification->setGenerationdate(new DateTime());
            $classification->setRound($round);
            foreach ($games as $game) {
                $classification = self::createStanding($manager, $game, $classification);
            }
            
            //If there any game played don't create classification
            $manager->persist($classification);
            $manager->flush();
            return $classification;
        }
    }

    public function createStanding(ObjectManager $manager, $game, $classification) {
       
        //New objects
        $standingLocal = new Standing();
        $standingVisitor = new Standing();
        
        //club and classification
        $standingLocal = $standingLocal->setClub($game->getLocalclub());
        $standingVisitor = $standingVisitor->setClub($game->getVisitorclub());
        $standingLocal = $standingLocal->setClassification($classification);
        $standingVisitor = $standingVisitor->setClassification($classification);
               
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

            //TODO: Check that these standings exists

            //Local
            $standingLocal->setGameswin($lastStandingLocal[0]->getGameswin());
            $standingLocal->setGamesdefeat($lastStandingLocal[0]->getGamesdefeat());
            $standingLocal->setGamesdraw($lastStandingLocal[0]->getGamesdraw());
            $standingLocal->setPoints($lastStandingLocal[0]->getPoints());
            $standingLocal->setGoalsfavorables($lastStandingLocal[0]->getGoalsfavorables());
            $standingLocal->setGoalsagainst($lastStandingLocal[0]->getGoalsagainst());
            $standingLocal->setGoalsdifference($lastStandingLocal[0]->getGoalsdifference());
            $standingLocal->setGamesplayed($lastStandingLocal[0]->getGamesplayed());

            //Visitor
            $standingVisitor->setGameswin($lastStandingVisitor[0]->getGameswin());
            $standingVisitor->setGamesdefeat($lastStandingVisitor[0]->getGamesdefeat());
            $standingVisitor->setGamesdraw($lastStandingVisitor[0]->getGamesdraw());
            $standingVisitor->setPoints($lastStandingVisitor[0]->getPoints());
            $standingVisitor->setGoalsfavorables($lastStandingVisitor[0]->getGoalsfavorables());
            $standingVisitor->setGoalsagainst($lastStandingVisitor[0]->getGoalsagainst());
            $standingVisitor->setGoalsdifference($lastStandingVisitor[0]->getGoalsdifference());
            $standingVisitor->setGamesplayed($lastStandingVisitor[0]->getGamesplayed());
        }

        if ($game->getGamestate() == 'PLAYED') {
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

            //persist game
            $game->setStandingcount(true);
            $manager->persist($game);
    
        }

        //add standings to classification
        $classification = $classification->addStanding($standingLocal);
        $classification = $classification->addStanding($standingVisitor);
        
        //persist standing
        $manager->persist($standingLocal);
        $manager->persist($standingVisitor);

        //return classification
        return $classification;

    }

    public function orderClassification(ObjectManager $manager, $classification) {
        $standings = $manager->getRepository('ecucurellaSporTiuBundle:Standing')
            ->findStandingsByClassification($classification);
        $position = 1;
        foreach ($standings as $standing) {
            $standing->setPosition($position);
            $position += 1;
            $manager->persist($standing);
        }
        $manager->flush();
        return $classification;
    }

}
