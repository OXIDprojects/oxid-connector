<?php
namespace jtl\Connector\Oxid;

use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Core\Rpc\RequestPacket;
use \jtl\Core\Utilities\RpcMethod;
use \jtl\Core\Controller\Controller as CoreController;
use \jtl\Core\Database\Mysql;

use \jtl\Connector\Transaction\Handler as TransactionHandler;
use \jtl\Connector\Session\SessionHelper;
use \jtl\Connector\Base\Connector as BaseConnector;

use \jtl\Connector\Oxid\Config\Loader\Config as ConfigLoader;

class Connector extends BaseConnector
{
    protected $_controller;
    protected $_action;

    protected function init()
    {
        
        $config = new Config();
        
        //if (isset($_SESSION['config'])) 
        //{
        //    $config = $_SESSION['config'];
        //}
        //Else
        //{
        //    $config = new ConfigLoader();
        //    $_SESSION['config'] = $config;
        //}
        
        
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
        if (($this->_action != "commit")) {
            return $this->_controller->{$this->_action}($requestpacket->getParams());
        }
        else if (TransactionHandler::exists($requestpacket) && TransactionHandler::isMain($this->getMethod()->getController()) && $this->getMethod()->getAction() == "commit") {
            return $this->_controller->{$this->_action}($requestpacket->getParams(), $requestpacket->getGlobals()->getTransaction()->getId());
        }
        else {
            throw new TransactionException("Only main controller can handle commit actions");
        }
    }

    public function getController()
    {
        return $this->_controller;
    }

    public function setController(CoreController $controller)
    {
        $this->_controller = $controller;
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function setAction($action)
    {
        $this->_action = $action;
    }
}