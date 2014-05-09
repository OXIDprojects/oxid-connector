<?php
/**
  * @copyright 2010-2014 JTL-Software GmbH
 */

require_once (__DIR__ . "/../vendor/autoload.php");

use jtl\Connector\Application\Application;
use jtl\Core\Rpc\RequestPacket;
use jtl\Core\Rpc\ResponsePacket;
use jtl\Core\Rpc\Error;
use jtl\Core\Http\Response;
use jtl\Connector\Oxid\Connector;

$condir = __DIR__ . '/../vendor/jtl/connector/';
define('CONNECTOR_DIR', $condir);
define('ENDPOINT_DIR', realpath(__DIR__ . '/../../'));
define('OXID_DIR', ENDPOINT_DIR . "/oxid_michele/");

// Connector instance
$connector = Connector::getInstance();
$application = Application::getInstance();
$application->register($connector);
$application->run();