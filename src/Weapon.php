<?php

class Weapon {
    protected $name;
    protected $damage; //how much damage the weapon does (like: "sword, staff")
    protected $durability; //how many ussed before it breaks

    public function __construct($name, $damage, $durability=100) {  //construc called autot when u call a new weapon object
        $this->name = $name;
        $this->damage = $damage;
        $this->durability = $durability;
    }

//these are getter methods they return the value of the properties of the weapon class bc they're protected we cannot access them directly from outside
    public function getName() {
        return $this->name;
    }
    public function getDamage() {
        return $this->damage; //gives back the damage value
    }
    public function getDurability() {
        return $this->durability;
    }

    //we gona check is the weapon is broken like me
    public function isBroken() {
        return $this->durability <= 0;
        //returns trus if the durability is 0 or less
        //returns false if weapon still has durability
    }

    //use the weapon | methods can call other methods in the same class 
    public function use() {
        if (!$this->isBroken()) {
            $this->durability -= 10;
            return true; //weapon was used successfully
        }
        return false; //weapon is broken, cannot use it :( 
    }

    //repair the weapon / adds durability points
    public function repair($points) {
        $this->durability += $points; //+= means add the current value 
        if ($this->durability >100) {
            $this->durability = 100; //max durability is 100 | cannot go above tho 
        }
    }

    //display weapon info with __toString() method
    public function __toString() {
        $status = $this->isBroken() ? "Broken" : "OK"; //is broken shows broken otherwise returns ok 
        return $this->name . " (Damage: " . $this->damage . ", Durability: " . $this->durability . "%) - " . $status;
    }

}



?>