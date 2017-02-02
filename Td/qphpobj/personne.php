<?php
class personne{
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
        echo $this->nom;
    }


    public function modiadres(){
        this->nadres = $adresse;
    }

    public function calage(){
        return
    }

}


$mathieu = new personne;

$mathieu->afficher();



