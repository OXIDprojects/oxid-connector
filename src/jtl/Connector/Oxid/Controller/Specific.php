<?php
namespace jtl\Connector\Oxid\Controller;


use \jtl\Core\Rpc\Error;
use \jtl\Core\Model\QueryFilter;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Core\Result\Transaction as TransactionResult;

use \jtl\Connector\Result\Action;
use \jtl\Connector\ModelContainer\SpecificContainer;
use \jtl\Connector\Transaction\Handler as TransactionHandler;

use \jtl\Connector\Oxid\Mapper\Specific\Specific as SpecificMapper;
use \jtl\Connector\Oxid\Mapper\Specific\SpecificI18n as SpecificI18nMapper;
use \jtl\Connector\Oxid\Mapper\Specific\SpecificValue as SpecificValueMapper;
use \jtl\Connector\Oxid\Mapper\Specific\SpecificValueI18n as SpecificValueI18nMapper;
use \jtl\Connector\Oxid\Controller\BaseController;


class Specific extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new SpecificContainer();
            
            $specificMapper = new SpecificMapper();
            $specificI18nMapper = new SpecificI18nMapper();
            $specificValueMapper = new SpecificValueMapper();
            $specificValueI18nMapper = new SpecificValueI18nMapper();
            
            $specificMapper->fetchAll($container, 'specific');
            $specificI18nMapper->fetchAll($container, 'specific_i18n');
            $specificValueMapper->fetchAll($container, 'specific_value');
            //$specificValueI18nMapper->fetchAll($container, 'specific_value_i18n');
            
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