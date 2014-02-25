<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Game
 *
 * @ORM\Table()
 * @ORM\Entity
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
     * @ORM\Column(name="localpoints", type="integer")
     */
    private $localpoints;

    /**
     * @var integer
     *
     * @ORM\Column(name="visitorpoints", type="integer")
     */
    private $visitorpoints;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="gamedate", type="datetime")
     */
    private $gamedate;

    /**
     * @ManyToOne(targetEntity="Club", inversedBy="localgames")
     * @JoinColumn(name="localclub_id", referencedColumnName="id")
     **/
    private $localclubId;

    /**
     * @ManyToOne(targetEntity="Club", inversedBy="visitorgames")
     * @JoinColumn(name="visitorclub_id", referencedColumnName="id")
     **/
    private $visitorclubId;


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
}
