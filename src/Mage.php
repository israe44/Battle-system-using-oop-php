<?php 
require_once 'Perso.php';


class Mage extends Perso {
    protected $mana; //unique property for mage

    public function __construct($nom, $hp, $puissance, $mana) {
        parent:: __construct($nom, $hp, $puissance);
        $this->mana = $mana;
    }
    public function getMana() {
        return $this->mana;
    }
    //polymorphism here! one inderface many implementations , one code works with many types
    public function hit ($degats) {
        //if mage has mana, use shield to reduce damage
        if ($this->mana >=10) {
            $this->mana -=10; //reduce damage by (50%)
            echo "Mana shield activated!";
        }   
        $this->hp = $this->hp - $degats;

        if ($this->hp < self::MIN_HP) {
            $this->hp = self::MIN_HP;
        }
        
        }
    public function __toString() {
        return parent::__toString() . ", Mana: " . $this->mana;
}
}