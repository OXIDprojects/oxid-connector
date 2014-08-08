<?php
namespace jtl\Connector\Oxid;

use jtl\Core\Http\Response;
use jtl\Core\Database\Mysql;
use jtl\Core\Rpc\RequestPacket;
use jtl\Core\Rpc\ResponsePacket;
use jtl\Core\Rpc\Error as Error;
use jtl\Core\Utilities\RpcMethod;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Controller\Controller as CoreController;

use jtl\Connector\Session\SessionHelper;
use jtl\Connector\Base\Connector as BaseConnector;
use jtl\Connector\Transaction\Handler as TransactionHandler;
use jtl\Connector\ModelContainer\MainContainer;

use jtl\Connector\Oxid\Config\Loader\Config as ConfigLoader;

class Connector extends BaseConnector
{
    protected $_controller;
    protected $_action;

    protected function init()
    {
        $config = new ConfigLoader;        
        
        $db = Mysql::getInstance();
        
        if (!$db->isConnected())
        {
            $db->connect(array(
                "host" => $config->dbHost, 
                "user" => $config->dbUser, 
                "password" => $config->dbPwd,
                "name" => $config->dbName
                ));
        }
        $db->setNames();
    }


    public function canHandle()
    {
        $controller = RpcMethod::buildController($this->getMethod()->getController());
        $class = "\\jtl\\Connector\\Oxid\\Controller\\{$controller}";

        if (class_exists($class))
        {
            $this->_controller = $class::getInstance();
            $this->_action = RpcMethod::buildAction($this->getMethod()->getAction());

            return is_callable(array($this->_controller, $this->_action));
        }

        return false;
    }

    public function handle(RequestPacket $requestpacket)
    {
        $this->init();
        $this->_controller->setMethod($this->getMethod());

        return $this->_controller->{$this->_action}($requestpacket->getParams());        
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
        
        file_put_contents("/tmp/error.log", date("[Y-m-d H:i:s] ") . "(" . $types[$errno] . ") File ({$errfile}, {$errline}): {$errstr}\n", FILE_APPEND);
    }
    
    public function shutdown_handler()
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
}