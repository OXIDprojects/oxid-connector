<?php

Namespace jtl\Connector\Oxid\Classes;

use \jtl\Connector\Oxid\Database As DB;

require_once("../Database/Database.php");
require_once("Category/CategoryConf.inc.php");
require_once("Company/CompanyConf.inc.php");
require_once("Customer/CustomerConf.inc.php");
require_once("CustomerOrder/CustomerOrderConf.inc.php");
require_once("Product/ProductConf.inc.php");
require_once("Specific/SpecificConf.inc.php");

$database = new DB\Database();

echo "<br/>";

$category = new Category\Category();

?>