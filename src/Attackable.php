<?php 

interface Attackable {
    public function attack($target);
    public function getDamage();
}