<?php

$bitPrices = [9,8,6,7,11,10];

function profit($bitPrices){
    return max($bitPrices) - min($bitPrices);
}
echo profit($bitPrices);

/*
function bestProfit($bitPrices)
{
    $temp = 0;
    $profit = 0;
    $test = [];
    for($i=0; $i<count($bitPrices); $i++ )
    {
        $temp = $bitPrices[$i];
        for($j=count($bitPrices)-1; $j >= 0; $j--)
        {
            $temp2 = $bitPrices[$j];
            $profit = abs($temp - $temp2);
            $test [] = $profit;
        }
    } 
    return $test;   
}

$arr = bestProfit($bitPrices);
print_r($arr);
for($i = 0; $i < count($arr); $i++)
{
    if($arr[$i] > $profitMax){
        $profitMax = $arr[$i];
    }
}

echo $profitMax;
*/