<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Recette de cocktail</title>
</head>
<body>
	<?php

	
	$cocktail = $_POST['name'];
	$cocktail = str_replace(' ', '%20', $cocktail);
	/*$recette = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $cocktail);*/
	$recette = json_decode(file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/search.php?s=' . $cocktail));
		foreach ($recette->drinks as $key => $value) {
			var_dump($value);
		}
		 echo 'Name: ' . $value->strDrink . '<br>';
		 echo 'Categorie: ' . $value->strCategory . '<br>';
		 echo '<img src="' . $value->strDrinkThumb . '"/>';
	/*var_dump($recette);*/
	?>
</body>
</html>