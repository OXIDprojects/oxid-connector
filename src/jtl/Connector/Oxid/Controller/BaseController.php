<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Controller\Controller;
use \jtl\Core\Database\Mysql;
use \jtl\Connector\Result\Action;
use \jtl\Core\Model\QueryFilter;
use \jtl\Connector\Transaction\Handler as TransactionHandler;
use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Rpc\Error;

class BaseController extends Controller
{
    protected $_db;
    
	public function __construct() {
        $this->_db = Mysql::getInstance();		 
	}	
	
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
	
    public function commit($params,$trid) {
        $reflect = new \ReflectionClass($this);
        $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}";
        
        if(class_exists($class)) {
            $action = new Action();
            $action->setHandled(true);
            
            try {
                $container = TransactionHandler::getContainer($this->getMethod()->getController(), $trid);
                
                $mapper = new $class();
                
                $result = new TransactionResult();
                $result->setTransactionId($trid);
                
                if($mapper->updateAll($container)) {
                    $action->setResult($result->getPublic());
                }
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
    
	public function delete($params) {
        
    }

    public function statistic($params) {
		
	}
	
	public function push($params) {
		
	}
	
}