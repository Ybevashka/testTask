<?php
include "config.php";
include "Classes/DaData.php";
use MyClasses\DaData;

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


$daData = new DaData($api_key);
$res = json_decode($daData->findPartyByInn(7728168971),true);
echo "Поиск организаций по ИНН<br/>";
if(count($res["suggestions"]) === 0)
    echo "Пусто<br><br>";
foreach ($res["suggestions"] as $key => $suggestion) {
    echo ($key+1)." - $suggestion[value]<br/>";
}

$res = json_decode($daData->findBankByBik("044525225"),true);
echo "<br/>Поиск банка по БИК<br/>";
if(count($res["suggestions"]) === 0)
    echo "Пусто<br><br>";
foreach ($res["suggestions"] as $key => $suggestion) {
    echo ($key+1)." - $suggestion[value]<br/>";
}