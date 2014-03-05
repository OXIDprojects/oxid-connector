<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Connector\Result\Action;
use \jtl\Connector\ModelContainer\ProductContainer;

use \jtl\Core\Rpc\Error;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Connector\Transaction\Handler as TransactionHandler;
use \jtl\Connector\Oxid\Mapper\Product\Product as ProductMapper;
use \jtl\Connector\Oxid\Controller\BaseController;
use \jtl\Core\Model\QueryFilter;

class Product extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new ProductContainer();
            
            $specificMapper = new ProductMapper();
            
            $specificMapper->fetchAll($container, 'product');
            
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