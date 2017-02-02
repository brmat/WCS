<?php
session_start();
$message = $_POST['message'];
$nom = 'nomxss'.uniqid();

$page_allowed = array('message','page1','page2');

//include ($_GET['page']);
//include './'.$_GET['page]; // ../../../../../etc/passwd;
//include $_GET['page']; // /etc/passwd;

//Pour éviter les inclusions ci-dessus =>Nettoyage de la variable en parametre
$page = filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING,
		array(FILTER_FLAG_STRIP_HIGH,FILTER_FLAG_STRIP_LOW));

$pageclean = str_replace(array('.','/','\\'), '', $page);

//echo $pageclean;

//test si la page est autorisée (page_allowed et existe sur le serveur)
//if($pageclean && file_exists($pageclean.'.php')){
if(in_array($pageclean, $page_allowed) && file_exists($pageclean.'.php')){
	require $pageclean.'.php';
} else { 
	echo 'La page n\'existe pas';
}
