<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Laetitia Girard
 *
 * @ORM\Entity(repositoryClass="AppBundle\Infra\Repository\VehiculeRepository")
 * @ORM\Table
 */
class Vehicule
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $numSerie;

    /**
     * @ORM\ManyToOne(targetEntity="Couleur")
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity="Finition")
     */
    private $finition;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Assert\DateTime
     */
    private $dateVente;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $prixNegocie;


    public function getId()
    {
        return $this->id;
    }

    public function setNumSerie($value)
    {
        $this->numSerie = $value;
        return $this;
    }

    public function getNumSerie()
    {
        return $this->numSerie;
    }

    public function setCouleur(Couleur $couleur)
    {
        $this->couleur = $couleur;
        return $this;
    }

    public function getCouleur()
    {
        return $this->couleur;
    }

    public function setFinition(Finition $finition)
    {
        $this->finition = $finition;
        return $this;
    }

    public function getFinition()
    {
        return $this->finition;
    }

    public function setDateVente(\DateTime $dateVente = null)
    {
        $this->dateVente = $dateVente;
        return $this;
    }

    public function getDateVente()
    {
        return $this->dateVente;
    }

    public function setPrixNegocie($value)
    {
        $this->prixNegocie = $value;
        return $this;
    }

    public function getPrixNegocie()
    {
        return $this->prixNegocie;
    }
    
}
