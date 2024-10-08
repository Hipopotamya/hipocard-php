<?php

require_once 'hipocard.php';

$hipcard = new HipcardIntegration();
$hipcard->setApiKey('HIPOCARDSENDBOXAPIKEY00000000001');
$hipcard->setApiSecret('HIPOCARD');
$hipcard->setEpinCode('HIPOCARDSANDBOXEPINCODE123AB0100');
$hipcard->setEpinSecret('HIPOCARD');
$hipcard->setPlayerName('player_name');
$hipcard->setUsedIp('127.0.0.1');

echo "<pre>";
var_dump($hipcard->checkEpinStatus());
echo "</pre>";
