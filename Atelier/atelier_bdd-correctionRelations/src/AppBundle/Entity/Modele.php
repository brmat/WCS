<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Laetitia Serre
 *
 * @ORM\Entity(repositoryClass="ReflectGen\Bundle\Infra\Repository\ModeleRepository")
 */
class Modele
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumn(onDelete="CASCADE")
     */
    private $categorie;

    /**
     * @ORM\ManyToMany(targetEntity="Couleur")
     */
    private $couleurs;

    /**
     * @ORM\OneToMany(targetEntity="Gabarit", mappedBy="modele")
     */
    private $gabarits;

    /**
     * @ORM\Column(type="string", length=400)
     */
    private $fiche;


    function __construct()
    {
        $this->couleurs = new ArrayCollection();
        $this->gabarits = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setCategorie(Categorie $categorie)
    {
        $this->categorie = $categorie;
        return $this;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }

    public function addCouleur(Couleur $couleur)
    {
        $this->couleurs->add($couleur);
        return $this;
    }

    public function removeCouleur(Couleur $couleur)
    {
        $this->couleurs->removeElement($couleur);
        return $this;
    }

    public function getCouleurs()
    {
        return $this->couleurs;
    }

    public function setFiche($file)
    {
        $this->fiche = $file;
        return $this;
    }

    public function getFiche()
    {
        return $this->fiche;
    }

    public function addGabarit(Gabarit $gabarit)
    {
        $this->gabarits->add($gabarit);
        return $this;
    }

    public function removeGabarit(Gabarit $gabarit)
    {
        $this->gabarits->removeElement($gabarit);
        return $this;
    }

    public function getGabarits()
    {
        return $this->gabarits;
    }
}
