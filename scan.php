<?php

if(count($argv) != 2) {
    die('Usage: php scan.php [logfile]');
}
if(!file_exists($argv[1])) {
    die("Can't find file: ".$argv[1]);
}

$handle = fopen($argv[1], "r");

$content = fread($handle, filesize($argv[1]));
$content = explode("\n", $content);

$lines = [];
foreach ($content as $line) {
    if(preg_match_all("/Internetverbindung wurde erfolgreich hergestellt. IP-Adresse: \d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/", $line, $variables)) $lines[] = $line;
}

$content = implode("\n", $lines);
file_put_contents($argv[1] . ".result", $content);
