<?php

class Hero
{
    private $name = '';
    private $hp = 0;
    private $damage = 0;

    public function __construct($name, $hp, $damage)
    {
        $this->name = $name;
        $this->hp = $hp;
        $this->damage = $damage;
    }

    public function attack($hero)
    {
        //echo 'Hero ' . $this->getStats($this) . ' attacks hero ' . $this->getStats($hero) . '<br>';
        $hero->fixDamage($this->damage);
        Logger::get()->log($this,$hero, $this->damage);
    }

    /*
    public function getStats($hero)
    {
        return $hero->getName() . '(' . $hero->getHP() . ', ' . $hero->getDamage() . ')';
    }*/

    public function fixDamage($damage)
    {
        $this->hp -= $damage;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getHP()
    {
        return $this->hp;
    }

    public function getDamage()
    {
        return $this->damage;
    }
}

?>