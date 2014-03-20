<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classification
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Classification
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
     * @var \DateTime
     *
     * @ORM\Column(name="generationdate", type="datetime")
     */
    private $generationdate;

    /**
     * @ORM\OneToMany(targetEntity="ecucurella\SporTiuBundle\Entity\Standing", mappedBy="id")
     **/
    private $standings;

    /**
     * @ORM\OneToOne(targetEntity="ecucurella\SporTiuBundle\Entity\Round", inversedBy="classification")
     * @ORM\JoinColumn(name="round_id", referencedColumnName="id")
     */
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
     * Set generationdate
     *
     * @param \DateTime $generationdate
     * @return Classification
     */
    public function setGenerationdate($generationdate)
    {
        $this->generationdate = $generationdate;

        return $this;
    }

    /**
     * Get generationdate
     *
     * @return \DateTime 
     */
    public function getGenerationdate()
    {
        return $this->generationdate;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->standings = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add standings
     *
     * @param \ecucurella\SporTiuBundle\Entity\Standing $standings
     * @return Classification
     */
    public function addStanding(\ecucurella\SporTiuBundle\Entity\Standing $standings)
    {
        $this->standings[] = $standings;

        return $this;
    }

    /**
     * Remove standings
     *
     * @param \ecucurella\SporTiuBundle\Entity\Standing $standings
     */
    public function removeStanding(\ecucurella\SporTiuBundle\Entity\Standing $standings)
    {
        $this->standings->removeElement($standings);
    }

    /**
     * Get standings
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getStandings()
    {
        return $this->standings;
    }

    /**
     * Set round
     *
     * @param \ecucurella\SporTiuBundle\Entity\Round $round
     * @return Classification
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
