<?php

use \jtl\Core\Rpc\Error;
use \jtl\Core\Http\Response;
use \jtl\Core\Rpc\RequestPacket;
use \jtl\Core\Rpc\ResponsePacket;
use \jtl\Connector\Application\Application;

use \jtl\Connector\Oxid;

define('ROOT_PATH', dirname(__DIR__) . '\\' );
define('CONNECTOR_PATH', ROOT_PATH . 'src\jtl\Connector\\');
define('CLASS_PATH', CONNECTOR_PATH . 'Oxid\Classes\\');
define('CONFIG_PATH', CONNECTOR_PATH . 'Oxid\Loader\Config\\');
define('DATABASE_PATH', CONNECTOR_PATH . 'Oxid\Database\\');
define('MAPPING_PATH', CONNECTOR_PATH . 'Oxid\Mapping\\');
define('OXID_SHOP_PATH', ROOT_PATH . '..\oxid-shop\\');

//define('CONNECTOR_DIR', __DIR__ . '/../vendor/jtl/connector/');
//define('AUTOLOAD_PATH', CONNECTOR_PATH . 'Oxid\autoloader.php');
//define('ENDPOINT_DIR', realpath(__DIR__ . '/../'));

function exception_handler(\Exception $exception)
{
    $trace = $exception->getTrace();
    if (isset($trace[0]['args'][0])) {
        $requestpacket = $trace[0]['args'][0];
    }
    
    $error = new Error();
    $error->setCode($exception->getCode())
        ->setData("Exception: " . substr(strrchr(get_class($exception), "\\"), 1) . " - File: {$exception->getFile()} - Line: {$exception->getLine()}")
        ->setMessage($exception->getMessage());

    $responsepacket = new ResponsePacket();
    $responsepacket->setError($error)
        ->setJtlrpc("2.0");
    
    if (isset($requestpacket) && $requestpacket !== null && is_object($requestpacket) && get_class($requestpacket) == "jtl\\Core\\Rpc\\RequestPacket") {
        $responsepacket->setId($requestpacket->getId());
    }
    
    Response::send($responsepacket);
}

set_exception_handler('exception_handler');

?>