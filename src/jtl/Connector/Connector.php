<?php
/**
 * 
 * @copyright 2010-2014 JTL-Software GmbH
 * @package jtl\Connector\Oxid
 */
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

Class Connector extends BaseConnector
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
}

?>