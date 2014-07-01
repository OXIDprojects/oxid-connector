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

error_repoting(E_ALL);
ini_set('display_errors', 0);

function exception_handler(\Exception $exception)
{
    $error = new Error();
    $error->setCode($exception->getCode())
        ->setData("Exception: " . substr(strrchr(get_class($exception), "\\"), 1) . " - File: {$exception->getFile()} - Line: {$exception->getLine()}")
        ->setMessage($exception->getMessage());
    
    $reponsepacket = new ResponsePacket();
    $reponsepacket->setError($error)
        ->setJtlrpc("2.0");
    
    Response::send($reponsepacket);
}

function error_handler($errno, $errstr, $errfile, $errline, $errcontext)
{
    $types = array(
        E_ERROR => 'E_ERROR',
        E_WARNING => 'E_WARNING', 
        E_PARSE => 'E_PARSE', 
        E_NOTICE => 'E_NOTICE', 
        E_CORE_ERROR => 'E_CORE_ERROR', 
        E_CORE_WARNING => 'E_CORE_WARNING', 
        E_CORE_ERROR => 'E_COMPILE_ERROR', 
        E_CORE_WARNING => 'E_COMPILE_WARNING', 
        E_USER_ERROR => 'E_USER_ERROR', 
        E_USER_WARNING => 'E_USER_WARNING', 
        E_USER_NOTICE => 'E_USER_NOTICE', 
        E_STRICT => 'E_STRICT', 
        E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR', 
        E_DEPRECATED => 'E_DEPRECATED', 
        E_USER_DEPRECATED => 'E_USER_DEPRECATED'
    );

    file_put_contents("/tmp/oxid_error.log", date("[Y-m-d H:i:s] ") . "(" . $types[$errno] . ") File ({$errfile}, {$errline}): {$errstr}\n", FILE_APPEND);
}

function shutdown_handler()
{
    if (($err = error_get_last())) {
        ob_clean();

        $error = new Error();
        $error->setCode($err['type'])
            ->setData('Shutdown! File: ' . $err['file'] . ' - Line: ' . $err['line'])
            ->setMessage($err['message']);

        $reponsepacket = new ResponsePacket();
        $reponsepacket->setError($error)
            ->setJtlrpc("2.0");
        
        Response::send($reponsepacket);
    }
}

set_error_handler('error_handler', E_ALL);
set_exception_handler('exception_handler');
register_shutdown_function('shutdown_handler');