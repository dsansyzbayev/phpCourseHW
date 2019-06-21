<?php

$a = 7;
$b = 5;
$c = $a + $b;
$b = $b + 1;

echo $c . $b;

$a = 1;
$a = $a * 2;
$a = $a * 3;
$a = $a * 4;
$a = $a * 5;
echo $a;

if ($a < 120) {
    echo 'Yes';
} else {
    echo 'No';
}

if ($a < 120 OR $b > 5) {
    echo 'Yes';
}

if ($a == 121) {
    echo 'Yes'; 
}

echo '<br>';

for ($i=0; $i<10; $i++) {
    echo $i;
}

echo '<hr>';
$a = 1;
for ($i=1; $i<6; $i++) {
    $a *= $i;
}
echo $a;