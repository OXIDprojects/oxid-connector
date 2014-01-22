<?php

Namespace jtl\Connector\Oxid\Classes;

use \jtl\Connector\Oxid\Database As DB;
//use \jtl\Connector\Oxid\Database;

require_once("../Database/Database.php");
require_once("Category/CategoryConf.inc.php");
require_once("Company/CompanyConf.inc.php");
require_once("Customer/CustomerConf.inc.php");
require_once("CustomerOrder/CustomerOrderConf.inc.php");
require_once("Product/ProductConf.inc.php");
require_once("Specific/SpecificConf.inc.php");

$temp = new DB\Database();

?>