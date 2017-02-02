<!DOCTYPE html>
<html>
<head>
<meta charset="utf8">
<title>API</title>
</head>
<body>
<h1> API Cocktail</h1>
<?php 
/*$cocktail = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/filter.php?a=Alcoholic');
$cocktail_php = json_decode($cocktail);
var_dump($cocktail_php);*/

/*$cocktail = file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/filter.php?a=Alcoholic');
$cocktail_json = json_encode($cocktail);
var_dump($cocktail_json);*/

$cocktails = json_decode(file_get_contents('http://www.thecocktaildb.com/api/json/v1/1/filter.php?a=Non_Alcoholic'));


?>
<form action="result.php" method="POST">
	<select name="name">
	<?php

	foreach ($cocktails as $key => $cocktail) {
	foreach ($cocktail as $key => $value) {
		echo '<option value="' . $value->strDrink . '">' . $value->strDrink . '</option>';
	}
	
} 


	?>
	</select>
	<input type="submit" value="Rechercher">
</body>

</html>