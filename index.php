<?php
require_once 'src/Perso.php';
require_once 'src/Guerrier.php';

$goku = new Perso(nom: "Goku", hp: 100, puissance: 10);
$vegeta = new Perso(nom: "Vegeta", hp:80, puissance: 7);
$goku->hit(degats:15);
echo $goku->__toString();
echo "<br>";
$vegeta->hit($goku->getPuissance());
echo $vegeta->__toString();
echo "Max HP" . Perso::MAX_HP . "<br>";
echo "Number of characters" . Perso::getNumberPerso() . "<br>";

echo "<h2>Guerrier</h2>";

$goku = new Guerrier("Goku", 100, 10, 5);
$vegeta = new Guerrier("Vegeta", 80, 7, 3);

// Guerrier takes reduced damage
$goku->hit(15);
echo "After taking 15 damage (armor reduces it): " . $goku . "<br>";


//weaponzz
$sword = new Weapon ("Sword", 20); //durability is set to 100 by default
$staff = new Weapon ("Staff", 10, 80); //durability is set to 80 custom
?>