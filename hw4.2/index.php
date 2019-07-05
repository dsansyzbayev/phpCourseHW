<?php

$d1 = strtotime('January 1 2000');
$untilDay= abs(ceil(($d1-time())/60/60/24/7/52));
$d2 = strtotime('January 1');
$today = abs(ceil(($d2 - time())/60/60/24/7));

echo '<table border="1px" cellspacing="1" cellpadding="1"  >';
for ($i=0; $i<=90; $i++) 
{
    echo '<tr>';
    for($j=0; $j<=52; $j++)
    {
        
        if($i == 0){
            if($j%5 == 0){
            echo "<th>$j</th>";
            } else{
            echo '<th></th>';
            }
        } else if($j == 0){
            if($i%5 == 0){
            echo "<th>$i</th>";
            }else{
            echo '<th></th>';
        }
    }
    
    if($i > 0 && $j > 0){
        if($i < $untilDay || $i == $untilDay && $j <= $today){
        echo '<td style="color:blue" border-style="solid" bgcolor="blue">__</td>';
        }else if($i > 65){
        echo '<td style="color:grey" border-style="solid" bgcolor="grey">__</td>';
        }else{
        echo '<td style="color:white" border-style="solid" bgcolor="white">__</td>';
        }
    }
    if($i == $untilDay && $j == $today){
        echo '<td style="color:yellow" border-style="solid" bgcolor="yellow">__</td>';
    }
    }
    echo '</tr>';
}

echo '</table>';

