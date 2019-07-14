<?php

#1

$num = rand(0,1000000);

#echo $num . '<br>';

#2,3

$revnum = 0;
$sum = 0;
while($num > 1)
{
    $rem = $num % 10;
    $sum += $rem;
    $revnum = ($revnum * 10) + $rem;
    $num = ($num/10);
}

#echo $revnum . '<br>' . $sum . '<br>';

#4

$product = 1;

$pattern = '/[0-9]/';
$result = [];
$arr4 = [];

preg_match_all($pattern, $num, $result);

# print_r($result);


for($i = 1; $i < count($result[0]) ; $i++)
{
    $arr4[] = $result[0][$i];
}
# print_r($arr4);

for($j = 0; $j < count($arr4); $j++)
{
    $product = $product * $arr4[$j];
}

# echo '<br>' . $product . '<br>';

#5

# echo min($arr4) . '  ' . max($arr4);

#6,7,8

$even = [];
$odd = [];
$simpleN = [];

for($i = 0; $i < count($arr4); $i++)
{
    if($arr4[$i] % 2 == 0)
    {
        $even[] = $arr4[$i];
    }
    else
    {
        $odd[] = $arr4[$i];
    }

}

for($i = 0; $i < count($arr4); $i++)
{
    for( $j = 2; $j < $arr4[$i]; $j++)
    {
        if($arr4[$i] % $j != 0)
        {
            $simple[] = $arr4[$i];
        }
    }
}

#print_r($even);
#print_r($odd);

#9

$arr9 = [];

for($i = 0; $i < 30; $i++)
{
    #$arr9[] = [];
    for($j = 0; $j < 20; $j++)
    {
        #$arr9[$i][] = [];
        for($k = 0; $k < 10; $k++)
        {
            $arr9[$i][$j][$k] = rand(0,100);
        }
    }
}

#print_r($arr9);

#10


foreach($arr9 as $key => $value)
{
    foreach($value as $key2 => $value2)
    {
        krsort($value2);
        $arr9[$key][$key2] =$value2;
    }
}

#print_r($arr9);

#11

foreach($arr9 as $key => $value)
{
    foreach($value as $key2 => $value2)
    {
        rsort($value2);
        $arr9[$key][$key2]=$value2;
    }
}

#print_r($arr9);

#12

foreach($arr9 as $key => $value)
{
    krsort($value);
    $arr9[$key]= $value;
}

#print_r($arr9);

#13

$pattern = '/[А-Я][а-я]+/u';
$subject = file_get_contents('https://yandex.ru/referats/?t=astronomy&s=45359');
$result = [];

preg_match_all($pattern, $subject, $result);

#print_r($result);

$arr13 = [];

for($i = 0; $i < 5; $i++)
{
    $arr13[] =[];
    for($j = 0; $j < 10; $j++)
    {
        shuffle($result[0]);
        $arr13[$i][$j] = $result[0][0] ;
    }
}

#print_r($arr13);

#14

/*
$col1 = ['1/8','1/4','1/2','Финал','1 место','2 место', '3место'];
$row1 = ['', '7 - 15','1-4','6-2','13-11','10-12','9-3','8-5','14-16'];
$row2 = ['','7-4','2-13','10-9','5-16'];
$row3 = ['', '4-13','10-16'];
$col2 = ['','','', '4-10', '10','4','16'];


echo '<table border="1px" cellspacing="0" cellpadding="2">';
for ($i=0; $i<7; $i++) {
    echo '<tr>';
    for($j = 0; $j < 1; $j++){
        echo '<td align=center>';
        echo $col1[$i];
        echo '</td>';
    }

    if($i == 0)
    {
        for($j = 1; $j < 9 ; $j++){
            echo '<td align=center>';
            echo $row1[$j];
            echo '</td>';
        }
    }
    if($i == 1)
    {
        for($j = 1; $j < 5 ; $j++){
            echo '<td align=center colspan ="2">';
            echo $row2[$j];
            echo '</td>';
        }
    }
    if($i == 2)
    {
        for($j = 1; $j < 3 ; $j++){
            echo '<td align=center colspan ="4">';
            echo $row3[$j];
            echo '</td>';
        }
    }
    if($i >= 3)
    {
        for($j =1; $j < 2; $j++){
            echo '<td align=center colspan ="8">';
            echo $col2[$i];
            echo'</td>';
        }
    }
    echo '</tr>';
}
echo '</table>';

*/

#15

$valueCard = ['6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
$suitCard = ['C', 'H', 'S', 'D'];
$deckCard = [];

for($i = 0; $i < count($suitCard); $i++ )
{
    for($j = 0; $j < count($valueCard); $j++)
    {
        $deckCard[] = $suitCard[$i] . $valueCard[$j];
    }
}

#print_r($deckCard);


#16,17

$players = [];
$mainCard = "";
$winSuit = "";

for($i = 0; $i < 4; $i++)
{
    $players[] = [];
    for($j = 0; $j < 6; $j++)
    {
        shuffle($deckCard);
        $players[$i][$j] = $deckCard[$j]; 
        $mainCard = $deckCard[24];   
    }
}

#print_r($players);
#echo $mainCard;

function checkWinSuit($card)
{
    if(strpos($card, 'H') !== false){
        $winSuit = 'H';
    } 
    if(strpos($card, 'C') !== false){
        $winSuit = 'C';
    } 
    if(strpos($card, 'S') !== false){
        $winSuit = 'S';
    } 
    if(strpos($card, 'D') !== false){
        $winSuit = 'D';
    } 
    return $winSuit;
}

#echo checkWinSuit($mainCard). '<br>';

$sPlay1 = 0;
$sPlay2 = 0;
$sPlay3 = 0;
$sPlay4 = 0;

for($i = 0; $i < 4; $i++)
{
    foreach($players[$i] as $key => $player)
    {
        if(strpos($player, checkWinSuit($mainCard)) !== false)
        {
            if($i == 0){
            $sPlay1++;
            }
            if($i == 1){
            $sPlay2++;
            }
            if($i == 2){
            $sPlay3++;
            }
            if($i == 3){
            $sPlay4++;
            }

        }
    }
}

$playersWinSuit = [
    'Player1' => $sPlay1,
    'Player2' => $sPlay2,
    'Player3' => $sPlay3,
    'Player4' => $sPlay4,
];

#print_r($playersWinSuit);

#echo max($playersWinSuit);

#17

$birthdays = ['July 17','January 17','January 05','June 28','July 19','June 5'];
$untilDay= [];

foreach($birthdays as $key =>$value){
    $d1 = strtotime($birthdays[$key]);
    $untilDay[] = abs(ceil(($d1-time())/60/60/24)) . ' days';
}

#print_r($untilDay);

#18

$birthdaysIn30 = ['July 17 2030','January 17 2030','January 05 2030','June 28 2030','July 19 2030','June 5 2030'];
$daysOfWeek = [];
foreach($birthdaysIn30 as $key=>$value){
    $d1 = strtotime($birthdaysIn30[$key]);
    $daysOfWeek [] = date('D',$d1);
}

#print_r($daysOfWeek);
#20

$arr20 = 'word';

function palyGen($arrr)
{
    $arrCh = str_split($arrr);
    $palySt = '';
    $palyArr = [];
    $tempR = [];

    for($i = 0; $i < rand(0,count($arrCh)); $i++)
    {
        $tempR [] = $arrCh[$i];   
    }

    $polyArr = array_merge($tempR, array_reverse($tempR));

    for($j = 0; $j < count($polyArr); $j++)
    {
        $palySt .= $polyArr[$j];
    }
    
    return $palySt;
}

#echo palyGen($arr20);

#21

$mArr = [
    1,
    345,
    375,
    976,
    3,
    2985,
    [
        75,
        348,
        348,
        9654,
        76,
        56943,
        [
            384,
            953,
            835,
            783,
            3464,
        ],
    ],
];

function sorting($arr)
{   
    if(is_array($arr) == true){
        foreach($arr as $key => $value){
            if(is_array($arr[$key]) == true){
                $arr[$key] = sorting($arr[$key]);
            }
            else{
                $t=count($arr)-1;
                for($s=0;$s<$t;$s++){
                    for($j=$s;$j<$t;$j++){
                        if($arr[$s]<$arr[$j]){
                            $tmp=$arr[$s];
                            $arr[$s]=$arr[$j];
                            $arr[$j]=$tmp;
                        }
                    }
                }
            }
        }
    }

    return $arr;
}

#print_r(sorting($mArr));

#22


$arrCat = [];
$catNam = [];
$file_handle = fopen('categories.csv', 'r');
while (!feof($file_handle) ) {
    $arrCat [] = fgetcsv($file_handle, 1165);
}
fclose($file_handle);

foreach($arrCat as $key => $value){
    $catNam []= [
        'id' => $value[0],
        'id_parent' => $value[1],
        'name' =>$value[2]
    ];
}


function buildTree($elements, $parentId = 0) {

    $branch = [];    
    foreach ($elements as $element) {
        if ($element['id_parent'] == $parentId && $element['id'] != $element['id_parent']) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['sub-category'] = $children;
            }
            $branch[$element['id']] = $element;
        }
    }
    return $branch;
}


print_r(buildTree($catNam));



?>

