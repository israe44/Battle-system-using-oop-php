<?php
/*
* public : can be accessed from anywhere
* private : can only be accessed from within the class
* protected : can be accessed from within the class and its subclass
*/
require_once 'Attackable.php';
require_once 'Healable.php';
abstract class Perso implements Attackable, Healable { //u can implement multiple interfaces (separated by a ,)
    protected $nom;
    protected $hp = 100;
    protected $puissance;
    protected $weapon = null; //this allows characters to start with no weapon
    const MAX_HP = 200;
    const MIN_HP = 0;
    abstract public function getCharacterType();
    abstract public function specialCharacterType($target);

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
    public function getWeapon() { //checks what weapon does the character have
        return $this->weapon;
    }
    public function equipWeapon($weapon) {  //this method allows the character to equip a weapon
        $this->weapon = $weapon;
        echo "{$this->nom} equipped {$weapon->getName()} <br>";
    }
    //this method allows the character to unequip a weapon
    public function unequipWeapon() {
        if ($this->weapon !==null) {
            echo "{$this->nom} unequipped {$this->weapon->getName()}! <br>";
            $this->weapon = null;
            } else {
                echo "{$this->nom} has no weapon to unequip! <br>";
            }
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
    public function attack($target) {
        $damage = $this->getDamage();
        echo "{$this->nom} attacks ! Damage: {$damage}<br>";
        $target->hit($damage);
    }
    public function getDamage() {
        $damage = $this->puissance;  // start with base power
        if ($this->weapon !== null) {   //ckeck if has weapon
            $damage += $this->weapon->getDamage();   //add weapon damage to existing value

        } 
        return $damage;   //return total
    }
}
