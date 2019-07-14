<?php

require "functions.php";

$host = '127.0.0.1';
$db   = 'Restalife';
$user = 'admin';
$pass = '5153';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

$stmt = $pdo->prepare("
    INSERT INTO
        `restalife`(
            `name`,
            `link`,
            `cuisine`,
            `worktime`,
            `address`
        ) VALUES (
            :n,
            :l,
            :c,
            :wt,
            :a
        )
");

$rests= [];
for($i = 1; $i <= 18; $i++ ){
    $rests = array_merge($rests, getRestsFromPage($i));
}

print_r($rests);

foreach($rests as $rest){
    $stmt->execute([
        ':n' => $rest['name'],
        ':l' => $rest['link'],
        ':c' => $rest['cuisine'],
        ':wt' => $rest['worktime'],
        ':a' => $rest['address']
    ]);
    
}

