<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\TransactionException;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Result\Transaction as TransactionResult;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\ProductContainer;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\Product\Product as ProductMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductI18n as ProductI18nMapper;
use jtl\Connector\Oxid\Mapper\Product\ProductPrice as ProductPriceMapper;

class Product extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new ProductContainer();
            
            $productMapper = new ProductMapper();          
            $productI18nMapper = new ProductI18nMapper();
            $productPriceMapper = new ProductPriceMapper();
            
            $productMapper->fetchAll($container, 'product');
            
            $productI18nMapper->fetchAll($container, 'product_i18n', $productI18nMapper->getProductI18n());
            
            $productPriceMapper->fetchAll($container, 'product_price');
            
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