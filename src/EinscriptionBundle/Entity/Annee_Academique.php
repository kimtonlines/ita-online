<?php

namespace EinscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annee_Academique
 *
 * @ORM\Table(name="annee_academique")
 * @ORM\Entity(repositoryClass="EinscriptionBundle\Repository\Annee_AcademiqueRepository")
 */
class Annee_Academique
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
     * @ORM\Column(name="annee", type="string", length=255, unique=true)
     */
    private $annee;
        

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
     * Set annee
     *
     * @param string $annee
     *
     * @return Annee_Academique
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return string
     */
    public function getAnnee()
    {
        return $this->annee;
    }
}
