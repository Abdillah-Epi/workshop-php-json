<?php

$auto = file_get_contents("./autologin");

echo $auto, '\n';

$start = date("Y-m-d", strtotime("now"));
$tmp = strtotime("+7 day", strtotime("now"));
$end = date("Y-m-d", $tmp);

$url = "https://intra.epitech.eu/$auto/planning/load?format=json&start=$start&end=$end";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);

file_put_contents("config.json", $output, FILE_APPEND);

?>