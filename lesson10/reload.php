<?php

require "functions.php";
require "db.php";

$rests = [];
$maxPage = getMaxPage(1);

for($i = 1; $i <= $maxPage; $i++ ){
    $rests = array_merge($rests, getRestsFromPage($i));
}

print_r($rests);

$cuisines = [];

foreach($rests as $rest){
    $cuisines = array_merge($cuisines, $rest['cuisine']);
}
$cuisines = array_unique($cuisines);
print_r($cuisines);

$stmt = $pdo->prepare("TRUNCATE `restaurants`");
$stmt = $pdo->prepare("TRUNCATE `cuisines`");
$stmt = $pdo->prepare("TRUNCATE `RCS");
$stmt->execute();

$stmt = $pdo->prepare("
    INSERT INTO
        `cuisines` (
            `name`
        ) VALUES (
            :name
        )
");

foreach($cuisines as $cuisine){
    $stmt->execute([
        ':name' => $cuisine
    ]);
}

$stmt = $pdo->prepare("
    INSERT INTO
        `restaurants`(
            `name`,
            `link`,
            `price_min`,
            `price_max`,
            `worktime`,
            `address`
        ) VALUES (
            :n,
            :l,
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
        ':p_min' => $rest['price']['price_min'],
        ':p_max' => $rest['price']['price_max'],
        ':wt' => $rest['worktime'],
        ':a' => $rest['address']
    ]);
    
}

