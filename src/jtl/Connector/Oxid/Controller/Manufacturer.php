<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\ManufacturerContainer;

use \jtl\Core\Rpc\Error;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Connector\Transaction\Handler as TransactionHandler;
use \jtl\Connector\Oxid\Mapper\Manufacturer\Manufacturer as ManufacturerMapper;
use \jtl\Connector\Oxid\Mapper\Manufacturer\ManufacturerI18n As ManufacturerI18nMapper;
use \jtl\Connector\Oxid\Controller\BaseController;
use \jtl\Core\Model\QueryFilter;

class Manufacturer extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new ManufacturerContainer();
            
            $manufacturerMapper = new ManufacturerMapper();
            //$manufacturerI18nMapper = new ManufacturerI18nMapper();
            
            $manufacturerMapper->fetchAll($container, 'manufacturer');
            //$manufacturerI18nMapper->fetchAll($container, 'manufacturerI18n');
            
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