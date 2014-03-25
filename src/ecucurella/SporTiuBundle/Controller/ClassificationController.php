<?php

namespace ecucurella\SporTiuBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ecucurella\SporTiuBundle\DependencyInjection\ClassificationHelper;
use ecucurella\SporTiuBundle\Entity\Round;
use Doctrine\DBAL\DBALException;
use PDOException;

class ClassificationController extends Controller
{
   
    public function roundAction($round_id)
    {
        //try {
            $clhelper = new ClassificationHelper();
            $round = $this->getDoctrine()->getRepository('ecucurellaSporTiuBundle:Round')->find($round_id);
            if (!$round) {
                return $this->render('ecucurellaSporTiuBundle:Classification:round.html.twig', 
                    array('round' => $round, 'round_id' => $round_id));
            } else {
                $standings = $clhelper->getStandingsforClassificationRound($this->getDoctrine()->getManager(), $round);
                return $this->render('ecucurellaSporTiuBundle:Classification:round.html.twig', 
                    array('round' => $round, 'round_id' => $round_id, 'standings' => $standings));
            }
        /*} catch (DBALException $dbal_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        } catch (PDOException $pdo_e) {
            return $this->redirect($this->generateUrl('ecucurella_SporTiu_install')); 
        }*/
    }

}
