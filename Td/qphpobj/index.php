<?php
class Personne{
    private $nom;
    private $prenom;
    private $adresse;
    private $datenais;


    public function __construct(){
        $this->nom = 'baur';
        $this->prenom = 'mathieu';
        $this->adresse = '2 grand rue';
        $this->datenais = '05.09.1990';

    }

    public function afficher(){ 
        echo $this->nom . '<br>' . 
             $this->prenom . '<br>' .
             $this->adresse . '<br>' .
             $this->datenais . '<br><br>'; 
    }

    public function setAdresse(){
        $this->adresse = '5 grand rue';
    }

    public function getAge(){

        $annee_naissance = (int) substr($this->datenais, 6);
        $today = (int) date("Y");
        $age = $today - $annee_naissance;
        echo 'Tu as ' . $age . ' ans.';
    }

}


$mathieu = new Personne();

$mathieu->afficher();

$mathieu->setAdresse();

$mathieu->afficher();

$mathieu->getAge();


