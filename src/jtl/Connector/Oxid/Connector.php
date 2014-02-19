<?php
namespace jtl\Connector\Oxid;

use \jtl\Core\Config\Config;
use \jtl\Core\Config\Loader\Json as ConfigJson;
use \jtl\Core\Config\Loader\System as ConfigSystem;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Rpc\RequestPacket;
use \jtl\Connector\Base\Connector as BaseConnector;
use \jtl\Core\Utilities\RpcMethod;
use \jtl\Core\Controller\Controller as CoreController;
use \jtl\Connector\Transaction\Handler as TransactionHandler;

use \jtl\Connector\Oxid\Config\Loader\Config as ConfigLoader;

class Connector extends BaseConnector
{
    protected $_controller;
    protected $_action;
    
    protected function __construct()
    {
        $this->initializeConfiguration();
    }
    
    protected function initializeConfiguration()
    {
        $config = null;
        
    }
    
    
    public function canHandle()
    {
        $controller = RpcMethod::buildController($this->getMethod()->getController());
        $class = "\\jtl\\Connector\\XTC\\Controller\\{$controller}";
        
        if (class_exists($class)) {       
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

