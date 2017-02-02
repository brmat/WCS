<?php
$nom = $_POST['nom'];
$motdepasse = $_POST['motdepasse'];

// Code injecté : 
// " OR 1=1 -- "

$connectBDD = mysqli_connect('localhost','root','root','securitel');
$requeteSQL = 'SELECT numerocarte FROM comptes WHERE nom = "'.$nom.'" AND motdepasse = PASSWORD( "'.$motdepasse.'" )';
echo $requeteSQL.'<br>';
$reponse = mysqli_query($connectBDD, $requeteSQL);
$resultat = mysqli_fetch_assoc($reponse);
//affichage du resultat 
echo $resultat['numerocarte'];
