<?php
/*
* public : can be accessed from anywhere
* private : can only be accessed from within the class
* protected : can be accessed from within the class and its subclass
*/
class Perso {
    protected $nom;
    protected $hp = 100;
    protected $puissance;
    const MAX_HP = 200;
    const MIN_HP = 0;

    public static $numberPerso = 0;
    public function __construct($nom, $hp, $puissance) {
        $this->nom = $nom;
        $this->hp = $hp;
        $this->puissance = $puissance;
        self::$numberPerso++; // increment the number of perso when a new one is created
    }

    public function __destruct(){
        echo "The perso {$this->nom} has been destroyed ! <br>";
    }
    public static function getNumberPerso() {
        return self::$numberPerso;
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getHp() {
        return $this->hp;
    }

    public function getPuissance() {
        return $this->puissance;
    }

    public function setPuissance($puissance) {
        $this->puissance = $puissance;
    }
    
    public function hit($degats) {
        $this->hp = $this->hp - $degats;

        if ($this->hp < self::MIN_HP) {
            $this->hp = self::MIN_HP;
        }
    } 
    public function heal($points) {
        $this->hp = $this->hp + $points;

        if ($this->hp > self::MAX_HP) {
            $this->hp = self::MAX_HP;
        }
    }
    public function __toString() {
        return "Nom: " . $this->nom . ", HP: " . $this->hp . "%" . ", Puissance: " . $this->puissance;
    }
}