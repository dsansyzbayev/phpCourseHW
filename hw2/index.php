<?php

# Task 1
for ($j=1; $j<10; $j++) {
    for ($i=1; $i<10; $i++) {
        # echo $j . 'x' . $i . '=' . $j*$i . '<br>';
    }
}

# Task 2
$a = 1;
$b = 1;
for ($i=1; $i<82; $i++) {
    # echo $a . 'x' . $b . '=' . $a*$b . '<br>';
    $b++;
    if ($b == 10) {
        $a++;
        $b = 1;
    }
}

# Task 5
for ($i=3; $i<117341; $i*=3) {
    # echo $i . '<br>';
}

# Task 6
$sum = 0;
for ($i=100; $i<=200; $i++) {
    if ($i%17==0) {
        $sum += $i;
        $i += 16;
    }
}
# echo $sum;

# Task 8
$arr8 = [];
for ($i=0; $i<10; $i++) {
    $arr8[] = rand(0, 100);
}
#print_r($arr8);

# Task 9, 10
$max = $arr8[0];
$min = $arr8[0];
for ($i=1; $i<10; $i++) {
    if ($max < $arr8[$i]) {
        $max = $arr8[$i];
    }

    if ($min > $arr8[$i]) {
        $min = $arr8[$i];
    }
}
# echo $max . ', ' . $min;

# Task 11
$arr11 = [];
for ($i=0; $i<count($arr8); $i++) {
    $arr11[$i] = [];
    for ($j=0; $j<$arr8[$i]; $j++) {
        $arr11[$i][$j] = rand(0, 100);
    }
}
# print_r($arr11);

# Task 12
$arr12_1 = [];
$arr12_2 = [];
$arr12_3 = [];
for ($i=0; $i<20; $i++) {
    $arr12_1[$i] = rand(0, 100);
    $arr12_2[$i] = rand(0, 100);
    $arr12_3[$i] = $arr12_1[$i] - $arr12_2[$i];
}
/* 
print_r($arr12_1);
print_r($arr12_2);
print_r($arr12_3);
*/

# Task 13
$rand1 = rand(1, 10);
$arr13 = [];
for ($i=0; $i<$rand1; $i++) {
    $rand2 = rand(1,10);
    $arr13[$i] = [];
    for ($j=0; $j<$rand2; $j++) {
        $arr13[$i][$j] = rand(0, 100);
    }
}
print_r($arr13);

# Task 14
$sum = 0;
for ($i=0; $i<count($arr13); $i++) {
    for ($j=0; $j<count($arr13[$i]); $j++) {
        $sum += $arr13[$i][$j];
    }
}
echo $sum;
