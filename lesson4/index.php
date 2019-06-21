<?php

$pattern = '/<a class="place-story__title__link" href="\/restaurant\/[0-9a-z\-]{1,}">[A-zА-я0-9 ]{1,}<\/a>/u';
$subject = file_get_contents('https://restoran.kz/restaurant');
$result = [];

preg_match_all($pattern, $subject, $result);
print_r($result);