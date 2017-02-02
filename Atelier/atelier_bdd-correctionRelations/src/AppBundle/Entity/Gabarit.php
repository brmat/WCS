<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @author Laetitia Girard
 *
 * @ORM\Entity(repositoryClass="AppBundle\Infra\Repository\GabaritRepository")
 * @ORM\Table
 */
class Gabarit
{
    const CARB_ESS = 'ESS';
    const CARB_DIES = 'DIE';
    const CARB_HYB = 'HYB';
    const CARB_ELEC = 'ELC';

    const PORT_3 = '3';
    const PORT_5= '5';

    const CONSO_LIB = 'litres/100km';

    static $carburants = array(self::CARB_ESS => 'Essence', self::CARB_DIES => 'Diesel', self::CARB_HYB => 'Hybride', self::CARB_ELEC => 'Electrique');
    static $portes = array(self::PORT_3 => '3 portes', self::PORT_5 => '5 portes');

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Modele", inversedBy="gabarits")
     */
    private $modele;

    /**
     * @ORM\OneToMany(targetEntity="Finition", mappedBy="gabarit")
     */
    private $finitions;

    /**
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank
     * @Assert\Choice(choices={"E", "D"})
     */
    private $carburant;

    /**
     * @ORM\Column(type="string", length=32, nullable=false)
     * @Assert\NotBlank
     * @Assert\Choice(choices={"3", "5"})
     */
    private $porte;

    /**
     * @ORM\Column(type="decimal", precision=3, scale=1)
     * @Assert\NotBlank
     */
    private $conso;


    function __construct()
    {
        $this->finitions = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setModele(Modele $modele)
    {
        $this->modele = $modele;
        return $this;
    }

    public function getModele()
    {
        return $this->modele;
    }

    public function setCarburant($value)
    {
        $this->carburant = $value;
        return $this;
    }

    public function getCarburant()
    {
        return $this->carburant;
    }

    public function setPorte($value)
    {
        $this->porte = $value;
        return $this;
    }

    public function getPorte()
    {
        return $this->porte;
    }

    public function setConso($value)
    {
        $this->conso = $value;
        return $this;
    }

    public function getConso()
    {
        return $this->conso;
    }

    public function addFinition(Finition $finition)
    {
        $this->finitions->add($finition);
        return $this;
    }

    public function removeFinition(Finition $finition)
    {
        $this->finitions->removeElement($finition);
        return $this;
    }

    public function getFinitions()
    {
        return $this->finitions;
    }
}
