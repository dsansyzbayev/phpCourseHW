<?php

require 'db.php';

$stmt = $pdo->prepare("
    SELECT
        *
    FROM
        `restaurants`
    WHERE 
        `price_min` > :p_min AND `price_max` < :p_max AND `cuisine` = :cuisine
");

$stmt->execute([
    ':p_min' => 1000,
    ':p_max' => 10000,
    ':cuisine' => 'европейская'
]);

print_r($stmt->fetchAll());