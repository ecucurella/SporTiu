<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ecucurella\SporTiuBundle\Entity\GameRepository")
 */
class Game
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
     * @ORM\Column(name="localpoints", type="integer", nullable=TRUE)
     */
    private $localpoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="visitorpoints", type="integer", nullable=TRUE)
     */
    private $visitorpoints;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gamedate", type="datetime")
     */
    private $gamedate;

    /**
     * @var string
     *
     * @ORM\Column(name="gamestate", type="string", length=20)
     */
    private $gamestate;

    /**
     * @ORM\ManyToOne(targetEntity="ecucurella\SporTiuBundle\Entity\Club", inversedBy="localgames")
     * @ORM\JoinColumn(name="localclub_id", referencedColumnName="id")
     **/
    private $localclub;

    /**
     * @ORM\ManyToOne(targetEntity="ecucurella\SporTiuBundle\Entity\Club", inversedBy="visitorgames")
     * @ORM\JoinColumn(name="visitorclub_id", referencedColumnName="id")
     **/
    private $visitorclub;

    /**
     * @ORM\ManyToOne(targetEntity="ecucurella\SporTiuBundle\Entity\Round", inversedBy="games")
     * @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     **/
    private $round;


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
     * Set localpoints
     *
     * @param integer $localpoints
     * @return Game
     */
    public function setLocalpoints($localpoints)
    {
        $this->localpoints = $localpoints;

        return $this;
    }

    /**
     * Get localpoints
     *
     * @return integer 
     */
    public function getLocalpoints()
    {
        return $this->localpoints;
    }

    /**
     * Set visitorpoints
     *
     * @param integer $visitorpoints
     * @return Game
     */
    public function setVisitorpoints($visitorpoints)
    {
        $this->visitorpoints = $visitorpoints;

        return $this;
    }

    /**
     * Get visitorpoints
     *
     * @return integer 
     */
    public function getVisitorpoints()
    {
        return $this->visitorpoints;
    }

    /**
     * Set gamedate
     *
     * @param \DateTime $gamedate
     * @return Game
     */
    public function setGamedate($gamedate)
    {
        $this->gamedate = $gamedate;

        return $this;
    }

    /**
     * Get gamedate
     *
     * @return \DateTime 
     */
    public function getGamedate()
    {
        return $this->gamedate;
    }

    /**
     * Set localclub
     *
     * @param \ecucurella\SporTiuBundle\Entity\Club $localclub
     * @return Game
     */
    public function setLocalclub(\ecucurella\SporTiuBundle\Entity\Club $localclub = null)
    {
        $this->localclub = $localclub;

        return $this;
    }

    /**
     * Get localclub
     *
     * @return \ecucurella\SporTiuBundle\Entity\Club 
     */
    public function getLocalclub()
    {
        return $this->localclub;
    }

    /**
     * Set visitorclub
     *
     * @param \ecucurella\SporTiuBundle\Entity\Club $visitorclub
     * @return Game
     */
    public function setVisitorclub(\ecucurella\SporTiuBundle\Entity\Club $visitorclub = null)
    {
        $this->visitorclub = $visitorclub;

        return $this;
    }

    /**
     * Get visitorclub
     *
     * @return \ecucurella\SporTiuBundle\Entity\Club 
     */
    public function getVisitorclub()
    {
        return $this->visitorclub;
    }



    /**
     * Set gamestate
     *
     * @param string $gamestate
     * @return Game
     */
    public function setGamestate($gamestate)
    {
        $this->gamestate = $gamestate;

        return $this;
    }

    /**
     * Get gamestate
     *
     * @return string 
     */
    public function getGamestate()
    {
        return $this->gamestate;
    }

    /**
     * Set round
     *
     * @param \ecucurella\SporTiuBundle\Entity\Round $round
     * @return Game
     */
    public function setRound(\ecucurella\SporTiuBundle\Entity\Round $round = null)
    {
        $this->round = $round;

        return $this;
    }

    /**
     * Get round
     *
     * @return \ecucurella\SporTiuBundle\Entity\Round 
     */
    public function getRound()
    {
        return $this->round;
    }
}
