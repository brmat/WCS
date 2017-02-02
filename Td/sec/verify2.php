<?php
$nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
$motdepasse = filter_input(INPUT_POST, 'motdepasse', FILTER_SANITIZE_SPECIAL_CHARS);

// Code injecté : 
// " OR 1=1 -- "

$connectBDD = mysqli_connect('localhost','root','root','securitel');
$requeteSQL = 'SELECT numerocarte FROM comptes WHERE nom = "'.$nom.'" AND motdepasse = PASSWORD( "'.$motdepasse.'" )';
echo $requeteSQL.'<br>';
$reponse = mysqli_query($connectBDD, $requeteSQL);
$resultat = mysqli_fetch_assoc($reponse);
//affichage du resultat 
echo $resultat['numerocarte'];
