<?php
namespace jtl\Connector\Oxid;

use jtl\Core\Database\Mysql;
use jtl\Core\Rpc\RequestPacket;
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

        // transaction        
        if (($this->_action !== "commit")) {
        	return $this->_controller->{$this->_action}($requestpacket->getParams());
        }
        else if (TransactionHandler::exists($requestpacket) && MainContainer::isMain($this->getMethod()->getController()) && $this->_action === "commit") {
        	return $this->_controller->{$this->_action}($requestpacket->getParams(), $requestpacket->getGlobals()->getTransaction()->getId());
        }
        else {
            throw new TransactionException("Only main controller can handle commit actions");
        }
    }
}