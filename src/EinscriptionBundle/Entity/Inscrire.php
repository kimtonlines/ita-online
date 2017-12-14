<?php

namespace EinscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Inscrire
 *
 * @ORM\Table(name="inscrire")
 * @ORM\Entity(repositoryClass="EinscriptionBundle\Repository\InscrireRepository")
 */
class Inscrire
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="EinscriptionBundle\Entity\Etudiant")
     * @ORM\JoinColumn(nullable=false)
     */
    private $etudiant;

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Inscrire
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

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
     * Set etudiant
     *
     * @param \EinscriptionBundle\Entity\Etudiant $etudiant
     *
     * @return Inscrire
     */
    public function setEtudiant(\EinscriptionBundle\Entity\Etudiant $etudiant)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \EinscriptionBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
