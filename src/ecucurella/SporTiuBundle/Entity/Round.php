<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Round
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Round
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordernum", type="integer")
     */
    private $ordernum;

    /**
     * @ORM\ManyToOne(targetEntity="ecucurella\SporTiuBundle\Entity\League", inversedBy="rounds")
     * @ORM\JoinColumn(name="league_id", referencedColumnName="id")
     **/
    private $league;

    /**
     * @ORM\OneToMany(targetEntity="ecucurella\SporTiuBundle\Entity\Game", mappedBy="round")
     **/
    private $games;

    /**
     * @var boolean
     *
     * @ORM\Column(name="roundplayed", type="boolean")
     */
    private $roundplayed;

    /**
     * @ORM\OneToOne(targetEntity="ecucurella\SporTiuBundle\Entity\Classification", mappedBy="round")
     */
    private $classification;

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
     * Set name
     *
     * @param string $name
     * @return Round
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ordernum
     *
     * @param integer $ordernum
     * @return Round
     */
    public function setOrdernum($ordernum)
    {
        $this->ordernum = $ordernum;

        return $this;
    }

    /**
     * Get ordernum
     *
     * @return integer 
     */
    public function getOrdernum()
    {
        return $this->ordernum;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->games = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set league
     *
     * @param \ecucurella\SporTiuBundle\Entity\League $league
     * @return Round
     */
    public function setLeague(\ecucurella\SporTiuBundle\Entity\League $league = null)
    {
        $this->league = $league;

        return $this;
    }

    /**
     * Get league
     *
     * @return \ecucurella\SporTiuBundle\Entity\League 
     */
    public function getLeague()
    {
        return $this->league;
    }

    /**
     * Add games
     *
     * @param \ecucurella\SporTiuBundle\Entity\Game $games
     * @return Round
     */
    public function addGame(\ecucurella\SporTiuBundle\Entity\Game $games)
    {
        $this->games[] = $games;

        return $this;
    }

    /**
     * Remove games
     *
     * @param \ecucurella\SporTiuBundle\Entity\Game $games
     */
    public function removeGame(\ecucurella\SporTiuBundle\Entity\Game $games)
    {
        $this->games->removeElement($games);
    }

    /**
     * Get games
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGames()
    {
        return $this->games;
    }

    /**
     * Set roundplayed
     *
     * @param boolean $roundplayed
     * @return Round
     */
    public function setRoundplayed($roundplayed)
    {
        $this->roundplayed = $roundplayed;

        return $this;
    }

    /**
     * Get roundplayed
     *
     * @return boolean 
     */
    public function getRoundplayed()
    {
        return $this->roundplayed;
    }

    /**
     * Set classification
     *
     * @param \ecucurella\SporTiuBundle\Entity\Classification $classification
     * @return Round
     */
    public function setClassification(\ecucurella\SporTiuBundle\Entity\Classification $classification = null)
    {
        $this->classification = $classification;

        return $this;
    }

    /**
     * Get classification
     *
     * @return \ecucurella\SporTiuBundle\Entity\Classification 
     */
    public function getClassification()
    {
        return $this->classification;
    }
}
