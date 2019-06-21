<?php

$pattern = '/<a class="place-story__title__link" href="(\/restaurant\/[0-9a-z\-]{1,})">(.{1,}?)<\/a>/u';
$subject = file_get_contents('https://restoran.kz/restaurant');
$result = [];

preg_match_all($pattern, $subject, $result);

$rests = [];
foreach ($result[1] as $key => $value) {
    $rests[] = [
        'name' => $result[2][$key],
        'link' => $value, 
    ];
}
print_r($rests);

$pattern = '/<dl class="row place-story__param"><dt class="col-xs-5 col-sm-3 place-story__param__title">(.+?)<\/dt><dd class="col-xs-7 col-sm-9 place-story__param__content">(.+?)<\/dd><\/dl>/u';
$result = [];
preg_match_all($pattern, $subject, $result);

foreach ($rests as $key => &$rest) {
    $rest['cuisine'] = $result[2][$key*4+0];
    $rest['price'] = $result[2][$key*4+1];
    $rest['worktime'] = $result[2][$key*4+2];
    $rest['address'] = $result[2][$key*4+3];

    //$rests[$key] = $rest;
}
print_r($rests);