<?php

$auto = file_get_contents("./autologin");
$DEFAULT = "\e[39m";
$start = date("Y-m-d", strtotime("now"));
$tmp = strtotime("+ 7 day", strtotime("now"));
$end = date("Y-m-d", $tmp);

$url = "https://intra.epitech.eu/$auto/planning/load?format=json&start=$start&end=$end";

$init = curl_init($url);

curl_setopt($init, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($init);

$arr = json_decode($output, null, 512, JSON_OBJECT_AS_ARRAY);
$data = json_decode(file_get_contents("./config.json"), null, 512, JSON_OBJECT_AS_ARRAY);

foreach($arr as $d) {
    echo $d["codemodule"];
    echo " ";
    echo "\e[38;5;69m", $d["start"], $DEFAULT;
    echo " ";
    echo "\e[38;5;69m", $d["end"], $DEFAULT;
    echo " ";
    echo "\e[38;5;96m", $d["titlemodule"], $DEFAULT;
    echo " ";
    if ($d["event_registered"]) {
        echo "\e[38;5;46m", "Yes", $DEFAULT;
    } else {
        echo "\e[91m", "No", $DEFAULT;
    }
    echo "\n";
}
?>