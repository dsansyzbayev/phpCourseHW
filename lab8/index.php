<?php

include "Player.php";
include "Hero.php";
include "Logger.php";

$heroNames1 = ['Thanos', 'Galactus', 'Dormamu', 'Altron', 'Hitler'];
$heroNames2 = ['Thor', 'Hulk', 'IronMan', 'Dr.Strange', 'Bakhtiar'];

$heroes1 = $heroes2 = [];

for($i = 0; $i < 5; $i++){
    $heroes1[] = new Hero($heroNames1[$i], rand(1000,2500), rand(20,170));
    $heroes2[] = new Hero($heroNames2[$i], rand(1000,2500), rand(20,170));
}

$birzhan = new Player('Birzhan', $heroes1);
$kazyna = new Player('Kazyna', $heroes2);

for($i = 0; $i < 1; $i+=0){
    //echo 'Round <hr>';

    $winner=$birzhan->step($kazyna);

    if($winner == null)
    {
        $winner=$kazyna->step($birzhan);
    }

    if($winner != null)
    {
        //echo 'Winner ' . $winner->name . '<hr>';
        break;
    }
}

$log = Logger::get()->getActivity();

$supLog = [];

foreach($log as $action){
    //echo $action['hero-active']->getName() . ' attacks ' .
    //$action['hero-passive']->getName() . ' ' . $action['damage'] . '<br>';
    $supLog[]= [
        'hero-active' => $action['hero-active']->getName(),
        'hero-active-hp' => $action['hero-active-hp'],
        'hero-passive' => $action['hero-passive']->getName(),
        'hero-passive-hp' => $action['hero-passive-hp'],
        'damage' => $action['damage']
    ];
}

print_r($supLog);
?>