<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * League
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class League 
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
     * @var string
     *
     * @ORM\Column(name="division", type="string", length=255)
     */
    private $division;

    /**
     * @var string
     *
     * @ORM\Column(name="season", type="string", length=255)
     */
    private $season;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datebegin", type="date")
     */
    private $dateBegin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateend", type="date")
     */
    private $dateEnd;

    /**
     * @ORM\OneToMany(targetEntity="ecucurella\SporTiuBundle\Entity\Round", mappedBy="league")
     **/
    private $rounds;

    /**
     * @ORM\ManyToMany(targetEntity="ecucurella\SporTiuBundle\Entity\Club", inversedBy="leagues")
     * @ORM\JoinTable(name="clubs_leagues")
    **/
    private $clubs;

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
     * @return League
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
     * Set division
     *
     * @param string $division
     * @return League
     */
    public function setDivision($division)
    {
        $this->division = $division;

        return $this;
    }

    /**
     * Get division
     *
     * @return string 
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * Set season
     *
     * @param string $season
     * @return League
     */
    public function setSeason($season)
    {
        $this->season = $season;

        return $this;
    }

    /**
     * Get season
     *
     * @return string 
     */
    public function getSeason()
    {
        return $this->season;
    }
    
    /**
     * Set dateBegin
     *
     * @param \DateTime $dateBegin
     * @return League
     */
    public function setDateBegin($dateBegin)
    {
        $this->dateBegin = $dateBegin;

        return $this;
    }

    /**
     * Get dateBegin
     *
     * @return \DateTime 
     */
    public function getDateBegin()
    {
        return $this->dateBegin;
    }

    /**
     * Set dateEnd
     *
     * @param \DateTime $dateEnd
     * @return League
     */
    public function setDateEnd($dateEnd)
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    /**
     * Get dateEnd
     *
     * @return \DateTime 
     */
    public function getDateEnd()
    {
        return $this->dateEnd;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->rounds = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add rounds
     *
     * @param \ecucurella\SporTiuBundle\Entity\Round $rounds
     * @return League
     */
    public function addRound(\ecucurella\SporTiuBundle\Entity\Round $rounds)
    {
        $this->rounds[] = $rounds;

        return $this;
    }

    /**
     * Remove rounds
     *
     * @param \ecucurella\SporTiuBundle\Entity\Round $rounds
     */
    public function removeRound(\ecucurella\SporTiuBundle\Entity\Round $rounds)
    {
        $this->rounds->removeElement($rounds);
    }

    /**
     * Get rounds
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRounds()
    {
        return $this->rounds;
    }

    /**
     * Add clubs
     *
     * @param \ecucurella\SporTiuBundle\Entity\Club $clubs
     * @return League
     */
    public function addClub(\ecucurella\SporTiuBundle\Entity\Club $clubs)
    {
        $this->clubs[] = $clubs;

        return $this;
    }

    /**
     * Remove clubs
     *
     * @param \ecucurella\SporTiuBundle\Entity\Club $clubs
     */
    public function removeClub(\ecucurella\SporTiuBundle\Entity\Club $clubs)
    {
        $this->clubs->removeElement($clubs);
    }

    /**
     * Get clubs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getClubs()
    {
        return $this->clubs;
    }
}
