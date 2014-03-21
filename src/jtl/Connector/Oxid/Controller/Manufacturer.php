<?php
namespace jtl\Connector\Oxid\Controller;

use jtl\Core\Rpc\Error;
use jtl\Core\Model\QueryFilter;
use jtl\Core\Exception\DatabaseException;
use jtl\Core\Exception\TransactionException;

use jtl\Connector\Result\Action;
use jtl\Connector\ModelContainer\ManufacturerContainer;
use jtl\Connector\Result\Transaction as TransactionResult;
use jtl\Connector\Transaction\Handler as TransactionHandler;

use jtl\Connector\Oxid\Controller\BaseController;
use jtl\Connector\Oxid\Mapper\Manufacturer\Manufacturer as ManufacturerMapper;
use jtl\Connector\Oxid\Mapper\Manufacturer\ManufacturerI18n As ManufacturerI18nMapper;


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
            $manufacturerI18nMapper = new ManufacturerI18nMapper();
            
            $manufacturerMapper->fetchAll($container, 'manufacturer');
            $manufacturerI18nMapper->fetchAll($container, 'manufacturerI18n', $manufacturerI18nMapper->getManufacturerI18n());
            
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
            $manufacturerMapper = new ManufacturerMapper();
            
            $statistic = new Statistic();
            $statistic->_controllerName = lcfirst(ClassName::getFromNS(get_called_class()));
            $statistic->_available = $manufacturerMapper->getAvailableCount();
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