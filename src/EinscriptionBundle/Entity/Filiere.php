<?php

namespace EinscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Filiere
 *
 * @ORM\Table(name="filiere")
 * @ORM\Entity(repositoryClass="EinscriptionBundle\Repository\FiliereRepository")
 */
class Filiere
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
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255, unique=true)
     */
    private $libelle;

    /**
     * @ORM\ManyToOne(targetEntity="EinscriptionBundle\Entity\Cycle")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cycle;

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
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Filiere
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set cycle
     *
     * @param \EinscriptionBundle\Entity\Cycle $cycle
     *
     * @return Filiere
     */
    public function setCycle(\EinscriptionBundle\Entity\Cycle $cycle)
    {
        $this->cycle = $cycle;

        return $this;
    }

    /**
     * Get cycle
     *
     * @return \EinscriptionBundle\Entity\Cycle
     */
    public function getCycle()
    {
        return $this->cycle;
    }
}
