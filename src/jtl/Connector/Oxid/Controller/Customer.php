<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Exception\TransactionException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\CustomerContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\Customer\Customer as CustomerMapper;
use jtl\Connector\Oxid\Mapper\Customer\CustomerAttr As CustomerAttrMapper;


class Customer extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new CustomerContainer();
            
            $customerMapper = new CustomerMapper();
            
            $customerMapper->fetchAll($container, 'customer', array('query' => "SELECT oxuser.*," .
                                                                                " oxnewssubscribed.OXDBOPTIN" .
                                                                                " FROM oxuser" .
                                                                                " INNER JOIN oxnewssubscribed" .
                                                                                " ON oxuser.OXID = oxnewssubscribed.OXUSERID;"));
            
            $result[] = $container->getPublic(array('items'), array('_fields'));
			
            $action->setResult($result);
        }
        catch (\Exception $exc) 
        {
            $err = new Error();
            $err->setCode($exc->getCode());
            $err->setMessage($exc->getMessage());
            $action->setError($err);
        }
        
        return $action;
        
    }
    
    public function statistic($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try {
            $customerMapper = new CustomerMapper();
            
            $statistic = new Statistic();
            $statistic->_controllerName = lcfirst(ClassName::getFromNS(get_called_class()));
            $statistic->_available = $customerMapper->getAvailableCount();
            $statistic->_pending = 0;

            $action->setResult($statistic->getPublic(array('_fields', '_isEncrypted')));
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

/* non mapped class
 * - CustomerAttr
 */