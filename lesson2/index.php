<?php
/*
$arr1 = [17, 41, 36];
echo $arr1[0];
$arr1[] = rand(0, 100);
echo $arr1[3];
$arr1[121] = 13;
echo $arr1[121];
$arr1[5] = 222;
$arr1[] = 777;
print_r($arr1);

$arr2 = [
    'H' => 'Hello',
    'W' => 'World',
    17 => 43,
    'a' => [21, 65, 46],
]; 
print_r($arr2);
echo $arr2['a'][2];
*/


$arr3 = [];
for ($i=1; $i<10; $i++) {
    $arr3[$i] = [];
    for ($j=1; $j<10; $j++) {
       $arr3[$i][$j] = $i * $j;
    }
}
echo '<pre>';
print_r($arr3);
echo '</pre>';
echo $arr3[6][8];





// somem tests

