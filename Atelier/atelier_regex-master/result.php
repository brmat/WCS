<h1>Résultat</h1>

<?php

	echo "Hello " . $_POST['nom'] . ' ' . $_POST['prenom'] . "<br>";

	if (preg_match('/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/', $_POST['email']))
		echo "L'adresse mail que tu as saisi est valide <br>";
	else
		echo "L'adresse mail que tu a saisi n'est pas valide <br>";

	$texte = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $_POST['comment']);

	echo $texte;