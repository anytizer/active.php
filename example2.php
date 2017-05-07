<?php
namespace test;

require_once("src/libraries/classes/class.database.inc.php");
require_once("src/libraries/classes/class.activerecord.inc.php");

use common\activerecord;

class configurations extends activerecord
{
	// table
	// pk id/value
	// find
}

$configurations = new configurations("configs_configurations", "configuration_id", "3", array());
$configurations->configuration_name = "apiURLs";

echo "\r\n", $configurations->configuration_name;