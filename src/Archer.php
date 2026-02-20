<?php
require_once 'Perso.php';

class Archer extends Perso {
    protected $arrows;

    public function __construct($nom, $hp, $puissance, $arrows = 10) {
        parent::__construct($nom, $hp, $puissance);
        $this->arrows = $arrows;
    }

    public function rangedAttack($target) {
        if ($this->arrows > 0) {
            $this->arrows--;
            $damage = $this->getDamage() + 5;
            echo "{$this->nom} shoots an arrow! Damage: {$damage}<br>";
            $target->hit($damage);
        } else {
            echo "{$this->nom} has no arrows left!<br>";
        }
        
    }
}