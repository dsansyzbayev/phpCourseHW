<?php

# Task 1
$a = rand(0, 10000);
echo $a;

echo '<hr>';

# Task 2
if ($a % 2 == 0) {
    echo 'Even';
} else {
    echo 'Odd';
}
echo '<hr>';

# Task 3
$sum = 0;
for ($i=1; $i<=$a; $i++) {
    if ($a % $i == 0) {
        $sum += $i;
    }
}
echo $sum;
echo '<hr>';

# Task 4
$sum = 0;
for ($i=1; $i<=$a; $i++) {
    if ($a % $i == 0 && $i % 2 == 0) {
        $sum += $i;
    }
}
echo $sum;
echo '<hr>';

# Task 5
$sum = 0;
for ($i=1; $i<=$a; $i++) {
    if ($a % $i == 0 && $i % 2 == 1) {
        $sum += $i;
    }
}
echo $sum;
echo '<hr>';

# Task 6
$count = 0;
for ($i=$a; $i>=1; $i/=10) {
    $count++;
}
echo $count . '<hr>';

# Task 7
$nok = 0;
$b = 6;
$c = 8;
for ($i=1; $i<=$b*$c; $i++) {
    if ($i % $b == 0 AND $i % $c == 0 AND $nok == 0) {
        $nok = $i;
    }
}
for ($i=1; $i<=$b*$c; $i++) {
    if ($i % $b == 0 AND $i % $c == 0) {
        $nok = $i;
        $i = $b*$c;
    }
}
for ($i=$b*$c; $i>=1; $i--) {
    if ($i % $b == 0 AND $i % $c == 0) {
        $nok = $i;
    }
}
echo $nok;

# Task 8
echo '<table border=1>';
for ($i=0; $i<11; $i++) {
    echo '<tr>';
    for ($j=0; $j<11; $j++) {
        if ($i == $j OR $i+$j == 10) {
            echo '<td> X </td>';
        } else {
            echo '<td align=center> - </td>';
        }
    }
    echo '</tr>';
}
echo '</table>';