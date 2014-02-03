<?php

namespace ecucurella\SporTiuBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Club
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Club
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="Abbreviation", type="string", length=16)
     */
    private $abbreviation;

    /**
     * @var string
     *
     * @ORM\Column(name="Creation_Year", type="string", length=4, nullable=TRUE)
     */
    private $creationYear;

    /**
     * @var string
     *
     * @ORM\Column(name="Logo", type="string", length=255, nullable=TRUE)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="Colors", type="string", length=255, nullable=TRUE)
     */
    private $colors;

    /**
     * @var string
     *
     * @ORM\Column(name="Alternative_Colors", type="string", length=255, nullable=TRUE)
     */
    private $alternativeColors;

    /**
     * @var string
     *
     * @ORM\Column(name="Email", type="string", length=255, nullable=TRUE)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="Website", type="string", length=255, nullable=TRUE)
     */
    private $website;


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
     * @return Club
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
     * Set abbreviation
     *
     * @param string $abbreviation
     * @return Club
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string 
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Set creationYear
     *
     * @param string $creationYear
     * @return Club
     */
    public function setCreationYear($creationYear)
    {
        $this->creationYear = $creationYear;

        return $this;
    }

    /**
     * Get creationYear
     *
     * @return string 
     */
    public function getCreationYear()
    {
        return $this->creationYear;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Club
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set colors
     *
     * @param string $colors
     * @return Club
     */
    public function setColors($colors)
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * Get colors
     *
     * @return string 
     */
    public function getColors()
    {
        return $this->colors;
    }

    /**
     * Set alternativeColors
     *
     * @param string $alternativeColors
     * @return Club
     */
    public function setAlternativeColors($alternativeColors)
    {
        $this->alternativeColors = $alternativeColors;

        return $this;
    }

    /**
     * Get alternativeColors
     *
     * @return string 
     */
    public function getAlternativeColors()
    {
        return $this->alternativeColors;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Club
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Club
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }
}
