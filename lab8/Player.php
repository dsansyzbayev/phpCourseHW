<?php

class Player
{
    public $name = '';
    public $heroes = [];

    function __construct($name, $heroes)
    {
        $this->name = $name;
        $this->heroes = $heroes;
    }

    public function step($player)
    {
        $heroes =  $this->getAliveHeroes();

        if(count($heroes) == 0){
            return $player;
        }

        //echo "Player: " . $this->name . "<br>";

        foreach($heroes as $hero){
            $enemyHeroes = $player->getAliveHeroes();

            if(count($enemyHeroes) == 0){
                return $this;
            }

            foreach($enemyHeroes as $enemyHero){
                $hero->attack($enemyHero);
            }
        }
       // echo '<hr>';

        return null;
    }

    public function getAliveHeroes()
    {
        $return = [];
        foreach($this->heroes as $hero){
            if($hero->getHP() > 0){
                $return[]=$hero;
            }
        }
        return $return;
    }

    public function getHeroAsArray()
    {
        $return =[];
        foreach($this->heroes as $hero){
            $return [] = [
                'name' => $hero->getName(),
                'damage' => $hero->getDamage(),
                'hp' => $hero->getHP(),
            ]; 
        }

        return $return;
    }
}

?>