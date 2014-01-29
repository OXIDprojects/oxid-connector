<?php

Namespace jtl\Connector\Oxid;

use \Mapping;

require_once '../../../bootstrap.php';

//$Category = new \jtl\Connector\Oxid\Classes\Category\Category();

$Companies = new Companies;
$Companies->getCompanies();

?>