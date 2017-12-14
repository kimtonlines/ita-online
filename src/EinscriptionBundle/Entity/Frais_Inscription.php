<?php

namespace EinscriptionBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Frais_Inscription
 *
 * @ORM\Table(name="frais_inscription")
 * @ORM\Entity(repositoryClass="EinscriptionBundle\Repository\Frais_InscriptionRepository")
 */
class Frais_Inscription
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
     * @ORM\Column(name="montant", type="string", length=255, unique=true)
     */
    private $montant;


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
     * Set montant
     *
     * @param string $montant
     *
     * @return Frais_Inscription
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }
}
