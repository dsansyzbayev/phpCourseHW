<?php

interface Chat {
    function sayHello();
    function meetToCode(Chat $user);
    function getName() : string;
}

interface SuperUser extends Chat {
    function ban(Chat $user);
}
class User implements Chat
{
    var $name = '';
    var $access = 'пользователь';

    function __construct($name)
    {
        $this->name =$name;
        $this->sayHello();
    }

    function sayHello()
    {
        echo $this->name . ': Всем привет! Меня зовут ' . $this->name . ',и я - '. $this->access . '!<br>';
    } 

    function meetToCode(Chat $user)
    {
        echo $this->name. ': Привет, ' . $user->getName() . ' ! Пойдем кодить ! <br>';
    }

    function getName():string
    {
        return $this->name;
    }
}

class Guest implements Chat
{
    var $access = 'Гость';
    var $number = null;
    
    function __construct()
    {
        $this->number = uniqid();
        $this->sayHello();
    }

    function sayHello()
    {
        echo 'Гость' . $this->number . ': Всем привет! Я - ' . $this->access . '<br>';
    }

    function meetToCode(Chat $user)
    {
        echo 'Гость' . $this->number . 'Йоу, ' . $user->getName() . ', ехало кодить!<br>';
    }

    function getName():string
    {
        return 'Гость-' . $this->number;
    }
}

class Admin extends User implements SuperUser
{
    var $access = 'admin';

    function ban(Chat $user)
    {
        echo $this->name . ': Гори в бане ' . $user->getName() . '! Просто так! <br>';
    }
}

$daniyar = new User('Данияр');
$aiman = new User('Айман');
$admindan = new Admin('Dan');
$alex = new Admin('Alexey');
$guest1 = new Guest();


$admindan->ban($aiman);
$alex->ban($admindan);
$daniyar->meetToCode($aiman);
$alex->meetToCode($guest1);
