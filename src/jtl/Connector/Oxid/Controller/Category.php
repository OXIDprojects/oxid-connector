<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Exception\TransactionException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\CategoryContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\Category\Category as CategoryMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryAttr as CategoryAttrMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryI18n as CategoryI18nMapper;
use jtl\Connector\Oxid\Mapper\Category\CategoryAttrI18n as CategoryAttrI18nMapper;

/**
 * Summary of Category
 */
class Category extends BaseController
{
    public function pull($params)
    {   
        $action = new Action();
        $action->setHandled(true);
        
        $this->statistic($params);
        
        try
        {
            $container = new CategoryContainer();
            
            $categoryMapper = new CategoryMapper();
            $categoryAttrMapper = new CategoryAttrMapper();
            $categoryI18nMapper = new CategoryI18nMapper();
            $categoryAttrI18nMapper = new CategoryAttrI18nMapper();
                        
            $categoryMapper->fetchAll($container, 'category');
            $categoryAttrMapper->fetchAll($container, 'category_attr', $categoryAttrMapper->getCategoryAttr());
            $categoryI18nMapper->fetchAll($container, 'category_i18n', $categoryI18nMapper->getCategoryI18n());
            $categoryAttrI18nMapper->fetchAll($container, 'category_attr_i18n', $categoryAttrI18nMapper->getCategoryAttrI18n());
            
            $result[] = $container->getPublic(array('items'));
			
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
    
    public function push($params)
    {
        
    }
}

/* non mapped Class
Category:
 * CategoryFunctionAttr
 * CategoryInvisibility
 * CategoryCustomerGroup
 */