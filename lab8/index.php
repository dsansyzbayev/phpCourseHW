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

$json=[
    'p1' => [
        'name' => $birzhan->name,
        'heroes' => $birzhan->getHeroAsArray(),
    ],
    'p2' => [
        'name' => $kazyna->name,
        'heroes' => $kazyna->getHeroAsArray(),
    ]
];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>.untitled</title>
</head>
<body>
    <script>
    var player = 
    <?php echo json_encode($json);
    ?>
    </script>
    <script src="main.js"></script>
</body>
</html>