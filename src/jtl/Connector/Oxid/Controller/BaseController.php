<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Database\Mysql;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Utilities\ClassName;
use jtl\Core\Controller\Controller;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Result\Transaction as TransactionResult;

use jtl\Connector\Result\Action;
use jtl\Connector\Model\Statistic;
use jtl\Connector\ModelContainer\MainContainer;

class BaseController extends Controller
{
    protected $_db;
    
	public function __construct() {
        $this->_db = Mysql::getInstance();
	}	
	
	/**
	 * (non-PHPdoc)
	 * @see \jtl\Core\Controller\IController::pull()
	 */
    public function pull($params) {
        $reflect = new \ReflectionClass($this);
        $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}";
        
        if(class_exists($class)) {
            $action = new Action();
            $action->setHandled(true);
            
            $filter = new QueryFilter();
            $filter->set($params);
            
            try {
                $mapper = new $class();
                
                $result = $mapper->fetchAll(null,null,array(
                    'offset' => $filter->getOffset(),
                    'limit' => $filter->getLimit()
                ));
                
                $action->setResult($result);
            }
            catch (\Exception $exc) {
                $err = new Error();
                $err->setCode($exc->getCode());
                $err->setMessage($exc->getMessage());
                $action->setError($err);
            }
            
            return $action;
        }
    }
	
    /**
     * 
     * @param unknown $params
     * @param unknown $trid
     * @return \jtl\Connector\Result\Action
     */
    public function commit($params,$trid) {
        $reflect = new \ReflectionClass($this);
        $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}";
        
        if(class_exists($class)) {
            $action = new Action();
            $action->setHandled(true);
            
            try {
                $container = TransactionHandler::getContainer($this->getMethod()->getController(), $trid);
                
                $mapper = new $class();
                
                $result = $mapper->updateAll($container,$trid);
             
                $action->setResult($result->getPublic());
            }
            catch (\Exception $exc) {
                $err = new Error();
                $err->setCode($exc->getCode());
                $err->setMessage($exc->getMessage());
                $action->setError($err);
            }
            
            return $action;
        }
    }
    
    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::delete()
     */
	public function delete($params) {
        
    }

    /**
     * (non-PHPdoc)
     * @see \jtl\Core\Controller\IController::statistic()
     */
    public function statistic($params) {
        $reflect = new \ReflectionClass($this);
        $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}\\{$reflect->getShortName()}";
        
        if(class_exists($class)) {
            $action = new Action();
            $action->setHandled(true);
            
            try {
                $mapper = new $class();
                
                $statModel = new Statistic();
                
                $statModel->_available = $mapper->fetchCount();
                
                $statModel->_pending = 0;
                $statModel->_controllerName = lcfirst($reflect->getShortName());
                
                $action->setResult($statModel->getPublic(array("_fields", "_isEncrypted")));
            }
            catch (\Exception $exc) {
                $err = new Error();
                $err->setCode($exc->getCode());
                $err->setMessage($exc->getMessage());
                $action->setError($err);
            }
            return $action;
        }
    }
	
	/**
	 * (non-PHPdoc)
	 * @see \jtl\Core\Controller\IController::push()
	 */
	public function push($params) {
		
	}
}