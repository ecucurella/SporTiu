<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Standing
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Standing
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="gamesplayed", type="integer")
     */
    private $gamesplayed;

    /**
     * @var integer
     *
     * @ORM\Column(name="gameswin", type="integer")
     */
    private $gameswin;

    /**
     * @var integer
     *
     * @ORM\Column(name="gamesdefeat", type="integer")
     */
    private $gamesdefeat;

    /**
     * @var integer
     *
     * @ORM\Column(name="gamesdraw", type="integer")
     */
    private $gamesdraw;

    /**
     * @var integer
     *
     * @ORM\Column(name="goalsfavorables", type="integer")
     */
    private $goalsfavorables;

    /**
     * @var integer
     *
     * @ORM\Column(name="goalsagainst", type="integer")
     */
    private $goalsagainst;

    /**
     * @var integer
     *
     * @ORM\Column(name="goalsdifference", type="integer")
     */
    private $goalsdifference;

    /**
     * @var integer
     *
     * @ORM\Column(name="points", type="integer")
     */
    private $points;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return Standing
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set gamesplayed
     *
     * @param integer $gamesplayed
     * @return Standing
     */
    public function setGamesplayed($gamesplayed)
    {
        $this->gamesplayed = $gamesplayed;

        return $this;
    }

    /**
     * Get gamesplayed
     *
     * @return integer 
     */
    public function getGamesplayed()
    {
        return $this->gamesplayed;
    }

    /**
     * Set gameswin
     *
     * @param integer $gameswin
     * @return Standing
     */
    public function setGameswin($gameswin)
    {
        $this->gameswin = $gameswin;

        return $this;
    }

    /**
     * Get gameswin
     *
     * @return integer 
     */
    public function getGameswin()
    {
        return $this->gameswin;
    }

    /**
     * Set gamesdefeat
     *
     * @param integer $gamesdefeat
     * @return Standing
     */
    public function setGamesdefeat($gamesdefeat)
    {
        $this->gamesdefeat = $gamesdefeat;

        return $this;
    }

    /**
     * Get gamesdefeat
     *
     * @return integer 
     */
    public function getGamesdefeat()
    {
        return $this->gamesdefeat;
    }

    /**
     * Set gamesdraw
     *
     * @param integer $gamesdraw
     * @return Standing
     */
    public function setGamesdraw($gamesdraw)
    {
        $this->gamesdraw = $gamesdraw;

        return $this;
    }

    /**
     * Get gamesdraw
     *
     * @return integer 
     */
    public function getGamesdraw()
    {
        return $this->gamesdraw;
    }

    /**
     * Set goalsfavorables
     *
     * @param integer $goalsfavorables
     * @return Standing
     */
    public function setGoalsfavorables($goalsfavorables)
    {
        $this->goalsfavorables = $goalsfavorables;

        return $this;
    }

    /**
     * Get goalsfavorables
     *
     * @return integer 
     */
    public function getGoalsfavorables()
    {
        return $this->goalsfavorables;
    }

    /**
     * Set goalsagainst
     *
     * @param integer $goalsagainst
     * @return Standing
     */
    public function setGoalsagainst($goalsagainst)
    {
        $this->goalsagainst = $goalsagainst;

        return $this;
    }

    /**
     * Get goalsagainst
     *
     * @return integer 
     */
    public function getGoalsagainst()
    {
        return $this->goalsagainst;
    }

    /**
     * Set goalsdifference
     *
     * @param integer $goalsdifference
     * @return Standing
     */
    public function setGoalsdifference($goalsdifference)
    {
        $this->goalsdifference = $goalsdifference;

        return $this;
    }

    /**
     * Get goalsdifference
     *
     * @return integer 
     */
    public function getGoalsdifference()
    {
        return $this->goalsdifference;
    }

    /**
     * Set points
     *
     * @param integer $points
     * @return Standing
     */
    public function setPoints($points)
    {
        $this->points = $points;

        return $this;
    }

    /**
     * Get points
     *
     * @return integer 
     */
    public function getPoints()
    {
        return $this->points;
    }
}
