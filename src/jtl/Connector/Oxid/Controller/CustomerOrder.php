<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\CustomerOrderContainer;

use \jtl\Core\Rpc\Error;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Connector\Transaction\Handler as TransactionHandler;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrder As CustomerOrderMapper;
use \jtl\Connector\Oxid\Controller\BaseController;
use \jtl\Core\Model\QueryFilter;

class CustomerOrder extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new CustomerOrderContainer();
            
            $customerOrderMapper = new CustomerOrderMapper();
            
            $customerOrderMapper->fetchAll($container, 'customer_order');
            
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
}