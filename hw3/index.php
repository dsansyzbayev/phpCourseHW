<?php

# Task 1
$arr1 = [];
for ($i=0; $i<10; $i++) {
    $arr1[] = rand(0, 100);
}
# print_r($arr1);

# Task 2
$sum = 0;
for ($i=0; $i<count($arr1); $i++) {
    $sum = $sum + $arr1[$i];
}
# echo $sum;

# Task 3
function sumArray($arr)
{
    $sum = 0;
    for ($i=0; $i<count($arr); $i++) {
        $sum = $sum + $arr[$i];
    } 
    return $sum;
}

# echo sumArray($arr1);

# Task 4, 5, 6, 7
function getMinMax($arr)
{
    if (count($arr) == 0) {
        return [null, null];
    }

    $min = $max = $arr[0];
    for ($i=1; $i<count($arr); $i++) {
        if ($min > $arr[$i]) {
            $min = $arr[$i];
        }
        if ($max < $arr[$i]) {
            $max = $arr[$i];
        }
    }
    return [$min, $max];
}

# print_r(getMinMax([]));

# Task 8
$arr8 = [];
for ($i=0; $i<10; $i++) {
    $arr8[] = rand(0, 100);
}
print_r($arr8);

# Task 9
function getEvens($arr)
{
    $return = [];
    for ($i=0; $i<count($arr); $i++) {
        if ($arr[$i] % 2 == 0) {
            $return[] = $arr[$i];
        }
    }
    return $return;
}
print_r(getEvens($arr8));

# Task 10
function getDividers($digit)
{
    $return = [];
    for ($i=1; $i<=$digit; $i++) {
        if ($digit%$i == 0) {
            $return[] = $i;
        }
    }
    return $return;
}
print_r(getDividers(rand(0, 100)));

# Task 11
$arr11 = [];
for ($i=0; $i<count($arr8); $i++) {
    $arr11[] = getDividers($arr8[$i]);
}
print_r($arr11);