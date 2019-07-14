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
$stmt->execute();

$stmt = $pdo->prepare("TRUNCATE `cuisines`");
$stmt->execute();

$stmt = $pdo->prepare("TRUNCATE `RCs");
$stmt->execute();

$stmt = $pdo->prepare("
    INSERT INTO
        `cuisines` (
            `name`
        ) VALUES (
            :name
        )
");

$cuisinesMap = [];

foreach($cuisines as $cuisine){
    $stmt->execute([
        ':name' => $cuisine
    ]);
    $cuisinesMap[$cuisine] = $pdo->lastInsertId();
}

print_r($cuisinesMap);

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

$stmtRC = $pdo->prepare("
        INSERT INTO
            `RCs`(
                `R-id`,
                `C-id`
            ) VALUES (
                :id_r,
                :id_c
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
    $restaurantId = $pdo->lastInsertId();
    foreach($rest['cuisine'] as $cuisine){
        $stmtRC->execute([
            ':id_r' => $restaurantId,
            ':id_c' => $cuisinesMap[$cuisine]
        ]);
    }
}

