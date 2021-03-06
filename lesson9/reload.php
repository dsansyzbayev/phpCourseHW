<?php

require "functions.php";

$rests = [];
$maxPage = getMaxPage(1);

for($i = 1; $i <= $maxPage; $i++ ){
    $rests = array_merge($rests, getRestsFromPage($i));
}

print_r($rests);

$host = '127.0.0.1';
$db   = 'cg_28_restaurants';
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

$stmt = $pdo->prepare("TRUNCATE `restaurant`");
$stmt->execute();

$stmt = $pdo->prepare("
    INSERT INTO
        `restaurants`(
            `name`,
            `link`,
            `cuisine`,
            `price_min`,
            `price_max`,
            `worktime`,
            `address`
        ) VALUES (
            :n,
            :l,
            :c,
            :p_min,
            :p_max,
            :wt,
            :a
        )
");

foreach($rests as $rest){
    $stmt->execute([
        ':n' => $rest['name'],
        ':l' => $rest['link'],
        ':c' => $rest['cuisine'],
        ':p_min' => $rest['price']['price_min'],
        ':p_max' => $rest['price']['price_max'],
        ':wt' => $rest['worktime'],
        ':a' => $rest['address']
    ]);
    
}

