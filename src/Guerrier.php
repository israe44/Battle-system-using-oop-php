<?php
require_once 'Perso.php';

// Guerrier extends from Perso
class Guerrier extends Perso {
    protected $armure;
    
    // Constructor - calls parent constructor + adds new property
    public function __construct($nom, $hp, $puissance, $armure) {
        parent::__construct($nom, $hp, $puissance); // Call parent constructor
        $this->armure = $armure;
    }
    
    public function getArmure() {
        return $this->armure;
    }

    public function hit($degats) {
        $degatsReduits = $degats - $this->armure;
        if ($degatsReduits < 0) {
            $degatsReduits = 0; // Prevent negative damage
        }

        $this->hp = $this->hp - $degatsReduits;

        if ($this->hp < self::MIN_HP) {
            $this->hp = self::MIN_HP;
        }
    }
    public function repareArmure($points) {
        $this->armure += $points;
    }
    public function __toString() {
        return parent::__toString() . ", Armure " . $this->armure;
    }

    
}


