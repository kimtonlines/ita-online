<?php

namespace EinscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Classe
 *
 * @ORM\Table(name="classe")
 * @ORM\Entity(repositoryClass="EinscriptionBundle\Repository\ClasseRepository")
 */
class Classe
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
     * @ORM\ManyToOne(targetEntity="EinscriptionBundle\Entity\Niveau")
     * @ORM\JoinColumn(nullable=false)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity="EinscriptionBundle\Entity\Filiere")
     * @ORM\JoinColumn(nullable=false)
     */
    private $filiere;

    /**
     * @ORM\ManyToOne(targetEntity="EinscriptionBundle\Entity\Periode")
     * @ORM\JoinColumn(nullable=false)
     */
    private $periode;

    /**
     * @ORM\ManyToOne(targetEntity="EinscriptionBundle\Entity\Antenne")
     * @ORM\JoinColumn(nullable=false)
     */
    private $antenne;

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
     * @return Classe
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
     * Set niveau
     *
     * @param \EinscriptionBundle\Entity\Niveau $niveau
     *
     * @return Classe
     */
    public function setNiveau(\EinscriptionBundle\Entity\Niveau $niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return \EinscriptionBundle\Entity\Niveau
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set filiere
     *
     * @param \EinscriptionBundle\Entity\Filiere $filiere
     *
     * @return Classe
     */
    public function setFiliere(\EinscriptionBundle\Entity\Filiere $filiere)
    {
        $this->filiere = $filiere;

        return $this;
    }

    /**
     * Get filiere
     *
     * @return \EinscriptionBundle\Entity\Filiere
     */
    public function getFiliere()
    {
        return $this->filiere;
    }

    /**
     * Set periode
     *
     * @param \EinscriptionBundle\Entity\Periode $periode
     *
     * @return Classe
     */
    public function setPeriode(\EinscriptionBundle\Entity\Periode $periode)
    {
        $this->periode = $periode;

        return $this;
    }

    /**
     * Get periode
     *
     * @return \EinscriptionBundle\Entity\Periode
     */
    public function getPeriode()
    {
        return $this->periode;
    }

    /**
     * Set antenne
     *
     * @param \EinscriptionBundle\Entity\Antenne $antenne
     *
     * @return Classe
     */
    public function setAntenne(\EinscriptionBundle\Entity\Antenne $antenne)
    {
        $this->antenne = $antenne;

        return $this;
    }

    /**
     * Get antenne
     *
     * @return \EinscriptionBundle\Entity\Antenne
     */
    public function getAntenne()
    {
        return $this->antenne;
    }
}
