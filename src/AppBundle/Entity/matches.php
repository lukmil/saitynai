<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * matches
 *
 * @ORM\Table(name="matches")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\matchesRepository")
 */
class matches
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     *@ORM\ManyToOne(targetEntity="champion")
     *@ORM\JoinColumn(name="champion1", referencedColumnName="id")
     */
    private $champion1;


    /**
     *@ORM\ManyToOne(targetEntity="champion")
     *@ORM\JoinColumn(name="champion2", referencedColumnName="id")
     */
    private $champion2;

    /**
     *@ORM\ManyToOne(targetEntity="champion")
     *@ORM\JoinColumn(name="stronger", referencedColumnName="id")
     */
    private $stronger;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set champion1
     *
     * @param integer $champion1
     *
     * @return matches
     */
    public function setChampion1($champion1)
    {
        $this->champion1 = $champion1;

        return $this;
    }

    /**
     * Get champion1
     *
     * @return int
     */
    public function getChampion1()
    {
        return $this->champion1;
    }

    /**
     * Set champion2
     *
     * @param integer $champion2
     *
     * @return matches
     */
    public function setChampion2($champion2)
    {
        $this->champion2 = $champion2;

        return $this;
    }

    /**
     * Get champion2
     *
     * @return int
     */
    public function getChampion2()
    {
        return $this->champion2;
    }

    /**
     * Set stronger
     *
     * @param integer $stronger
     *
     * @return matches
     */
    public function setStronger($stronger)
    {
        $this->stronger = $stronger;

        return $this;
    }

    /**
     * Get stronger
     *
     * @return int
     */
    public function getStronger()
    {
        return $this->stronger;
    }
}

