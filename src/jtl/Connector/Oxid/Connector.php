<?php
namespace jtl\Connector\Oxid;

use \jtl\Core\Config\Config,
\jtl\Core\Config\Loader\Json as ConfigJson,
\jtl\Core\Config\Loader\System as ConfigSystem,
\jtl\Core\Exception\TransactionException,
\jtl\Core\Rpc\RequestPacket,
\jtl\Connector\Base\Connector as BaseConnector,
\jtl\Core\Utilities\RpcMethod,
\jtl\Core\Controller\Controller as CoreController,
\jtl\Connector\Transaction\Handler as TransactionHndler,

\jtl\Connector\Oxid\Config\Loader\Config as ConfigLoader;

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