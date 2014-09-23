<?php
define("APP_DIR", __DIR__);

require_once (APP_DIR . "/../vendor/autoload.php");

use jtl\Connector\Application\Application;
use jtl\Core\Rpc\RequestPacket;
use jtl\Core\Rpc\ResponsePacket;
use jtl\Core\Rpc\Error;
use jtl\Core\Rpc\Respose;
use jtl\Connector\Oxid\Oxid;

$condir = __DIR__ . "/../vendor/jtl/connector/";
define('CONNECTOR_DIR', $condir);
define('ENDPOINT_DIR', realpath(__DIR__ . '/../../'));
define('OXID_DIR', ENDPOINT_DIR . "/oxid_michele/");

$connector = Oxid::getInstance();
$application = Application::getInstance();
$application->register($connector);
$application->run();