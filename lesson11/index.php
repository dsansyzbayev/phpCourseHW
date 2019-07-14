<?php

require 'db.php';

$stmt = $pdo->prepare("
    SELECT
        `restaurants`.*,
        `cuisines`.`name` AS `cuisine-name`
    FROM
        `restaurants`
    LEFT JOIN
        `RCs`
        ON `restaurants`.`id` = `RCs`.`R-id`
    LEFT JOIN 
        `cuisines`
        ON `RCs`.`C-id` = `cuisines`.`id`
    WHERE 
        `price_min` > :p_min AND `price_max` < :p_max AND `cuisines`.`name` = :cuisine
");

$stmt->execute([
    ':p_min' => 1000,
    ':p_max' => 10000,
    ':cuisine' => 'европейская'
]);

print_r($stmt->fetchAll());