<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Laetitia Girard
 *
 * @ORM\Entity(repositoryClass="AppBundle\Infra\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     * @Assert\NotBlank
     */
    private $nom;

    /**
     * @ORM\OneToMany(targetEntity="Modele", mappedBy="categorie")
     */
    private $modeles;


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

    public function addModele(Modele $modele)
    {
        $this->modeles->add($modele);
        return $this;
    }

    public function removeModele(Modele $modele)
    {
        $this->modeles->removeElement($modele);
        return $this;
    }

    public function getModeles()
    {
        return $this->modeles;
    }
}
