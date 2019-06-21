<?php

class PuppetMaster
{
    var $gender = '';
    var $voiceType = '';
    var $talant = 7;

    function launch($array)
    {
        $puppet = new Puppets();
        foreach($array as $key => $value)
        {
            if($key == 0)
            {
                echo $array[0] . ': ';
                $puppet->perform(['Human', 'Male','30','white']);
                echo "It's a wonderful weather today <br>";
            }

            if($key == 1)
            {
                echo $array[1] . ': ';
                $puppet->perform(['communist','alien','54','red']);
                echo "No, it's just a pineapple. Where do you see yogurt? <br>";
            }
            
        }
    }
}

class Puppets
{
    var $type = '';
    var $gender = '';
    var $age = '';
    var $color = '';

    function perform($array)
    {
        echo $array[0] . ' , ' . $array[1] . ' , ' . $array[2] . ' , ' . $array[3] . ': <br>'; 
    }
}

class Play
{
    function startPPMPlay()
    {
        echo ".untitled" . '<br>';
        $ppMaster = new PuppetMaster();
        $ppMaster->launch(['PuppetMaster1','PuppetMaster2']);
    }
}

class Audience 
{
    function applaud()
    {
        echo "Clap Clap" . '<br>'; 
    }
}

class Scene
{
    function __construct()
    {
        $play = new Play();
        $audience = new Audience();
        $play->startPPMPlay();
        $audience->applaud();
    }
}

$newScene = new Scene();


