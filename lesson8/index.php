<?php

class Doll
{
    private $name;
    private $type;
    private $gender;
    private $color;
    private $text;

    public function __construct($name,$type,$gender,$color,$text)
    {
        $this->name = $name;
        $this->type = $type;
        $this->gender = $gender;
        $this->color = $color;
        $this->text = $text;
    }

    public function perform()
    {
        echo 'Hello! My name is ' . $this->name 
        . ' and I - <span style="color:' . $this->color . '">'
        . $this->gender . ' ' . $this->type . '</span><br>' . $this->text . '<br>';
    }
}

class Puppeteer
{
    private $name;
    private $dolls = [];

    public function __construct($name,$dolls)
    {
        $this->name = $name;
        $this->dolls = $dolls;
    }

    public function perform()
    {
        echo 'Peforms, <strong>' . $this->name . '</strong><hr>';
        foreach($this->dolls as $doll) {
            $doll->perform();
        }
    }
}

$name = ['Daniyar', 'Alexey', 'Birzhan', 'Beket', 'Tolganai' ];
$type = [ 'Fox', 'Wolf', 'Rabbit', 'Panda', 'Cock'];
$text = [ 'I am smart fox', 'walk on the moon', 'soft and fluffy', 'eat dumplings','am being an asshole'];
$color = [ 'red', 'blue', 'green','yellow', 'purple'];
$gender = ['female','male'];

$dolls = [];

for($i = 0; $i <4; $i++) {
    $dolls [] = new Doll(
        $name[rand(0,4)], 
        $type[rand(0,4)], 
        $gender[rand(0,1)], 
        $color[rand(0,4)], 
        $text[rand(0,4)]
    );
}

$puppeteer1 = new Puppeteer('Crocodile Gena', [$dolls[0], $dolls[1]]);
$puppeteer2 = new Puppeteer('Cheburashka', [$dolls[2],$dolls[3]]);

$puppeteer1->perform();
$puppeteer2->perform();




?>