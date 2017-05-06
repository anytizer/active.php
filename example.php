<?php
require_once("src/libraries/classes/class.database.inc.php");
require_once("src/libraries/classes/class.activerecord.inc.php");

$activerecord = new activerecord("configs_configurations", "configuration_id", "3", array());
$activerecord->configuration_name = "apiURL";

echo "\r\n", $activerecord->configuration_name;
#echo "\r\n", $activerecord->configuration_name;
#print_r($activerecord);
