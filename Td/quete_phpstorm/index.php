<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<p>test</p>

<?php


$students = [
    "Emmanuel"  => 42,
    "Thierry"   => 51,
    "Pascal"    => 45,
    "Eric"      => 48,
    "Nicolas"   => 19
];

$somme_age = 0;

//  $students  .......  c'est le tableau
// $nom c'est la cle ou index du tableau

foreach ($students as $nom => $age) {

    echo 'nom =' . $nom . ' age = ' . $age . '<br>';
    $somme_age = $somme_age + $age;

    // ou on peu ecrir      $somme_age += $age;
}
?>
<?php
    $moyenne = ($somme_age)/count($students);
    echo 'moyenne =' . $moyenne .  '<br>' ;

?>
</body>
</html>