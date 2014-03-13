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
}
