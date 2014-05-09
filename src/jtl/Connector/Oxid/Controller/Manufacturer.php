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


class Manufacturer extends BaseController{
    
}