<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Database\Mysql;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Utilities\ClassName;
use jtl\Core\Controller\Controller;
use jtl\Core\Exception\TransactionException;

use jtl\Connector\Result\Action;
use jtl\Connector\Model\Statistic;
use jtl\Connector\ModelContainer\MainContainer;
use jtl\Connector\Transaction\Handler as TransactionHandler;

class BaseController extends Controller
{
    protected $_db;
    
	public function __construct() {
        $this->_db = Mysql::getInstance();
	}	
	
    public function pull($params) {
        $action = new Action();
        $action->setHandled(true);
        
        $filter = new QueryFilter();
        $filter->set($params);
        
        try {
            $reflect = new \ReflectionClass($this);
            $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}\\{$reflect->getShortName()}";
        
            if(!class_exists($class)) throw new \Exception("Class " . $class . " not available");
            
            $mapper = new $class();
                
            $result = $mapper->pull($params,$filter->getOffset(),$filter->getLimit());
                
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
    
    public function push($params) {
		$action = new Action();
        
        $action->setHandled(true);
        $action->setResult(true);
        
        return $action;
	}
	   
    public function delete($params) {
        
    }

    public function statistic($params) {
        $reflect = new \ReflectionClass($this);
        $class = "\\jtl\\Connector\\Oxid\\Mapper\\{$reflect->getShortName()}\\{$reflect->getShortName()}";
        
        if(class_exists($class)) {
            $action = new Action();
            $action->setHandled(true);
            
            try {
                $mapper = new $class();
                
                $statModel = new Statistic();
                
                $statModel->setAvailable($mapper->fetchCount());
                $statModel->setPending(0);
                $statModel->setControllerName(lcfirst($reflect->getShortName()));
                
                $action->setResult($statModel->getPublic());
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
}