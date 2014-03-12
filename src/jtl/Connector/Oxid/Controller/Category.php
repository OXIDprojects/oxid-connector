<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Result\Transaction as TransactionResult;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\Category\Category as CategoryMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryAttr as CategoryAttrMapper;

/**
 * Summary of Category
 */
class Category extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new CategoryContainer();
            
            $categoryMapper = new CategoryMapper();
            $categoryAttrMapper = new CategoryAttrMapper();
            
            
            $categoryMapper->fetchAll($container, 'category');
            $categoryAttrMapper->fetchAll($container, 'category_attr');
            
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