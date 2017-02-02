<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Laetitia Girard
 *
 * @ORM\Entity(repositoryClass="AppBundle\Infra\Repository\FinitionRepository")
 * @ORM\Table
 */
class Finition
{
    const PEINT_VER = 'VER';
    const PEINT_MET = 'MET';

    static $peintures = array(self::PEINT_VER => 'Vernie', self::PEINT_MET => 'Métallisée');

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Gabarit", inversedBy="finitions")
     */
    private $gabarit;

    /**
     * @ORM\OneToMany(targetEntity="Vehicule", mappedBy="finition")
     */
    private $vehicules;

    /**
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank
     * @Assert\Choice(choices={"VER", "MET"})
     */
    private $peinture;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $prixVente;


    function __construct()
    {
        $this->vehicules = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setGabarit(Gabarit $gabarit)
    {
        $this->gabarit = $gabarit;
        return $this;
    }

    public function getGabarit()
    {
        return $this->gabarit;
    }

    public function setPeinture($value)
    {
        $this->peinture = $value;
        return $this;
    }

    public function getPeinture()
    {
        return $this->peinture;
    }

    public function setPrixVente($value)
    {
        $this->prixVente = $value;
        return $this;
    }

    public function getPrixVente()
    {
        return $this->prixVente;
    }

    public function addVehicule(Vehicule $vehicule)
    {
        $this->vehicules->add($vehicule);
        return $this;
    }

    public function removeVehicule(Vehicule $vehicule)
    {
        $this->vehicules->removeElement($vehicule);
        return $this;
    }

    public function getVehicules()
    {
        return $this->vehicules;
    }
}
