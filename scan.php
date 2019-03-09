<?php

$file = "Push-Service 2017_20180218-1727.txt";

$handle = fopen($file, "r");

$content = fread($handle, filesize($file));

$content = explode("\n", $content);

$lines = [];

$i = 0;

foreach ($content as $line) {
    if(preg_match_all("/Internetverbindung wurde erfolgreich hergestellt. IP-Adresse: \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/", $line, $variables)) $lines[$i] = $line;
    $i++;
}

var_dump($lines);

$content = implode("\n", $lines);

file_put_contents($file . ".result", $content);


//if(preg_match_all("Internetverbindung wurde erfolgreich hergestellt. IP-Adresse: \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/", $content, $variables)) var_dump($variables);
