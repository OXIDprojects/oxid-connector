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
class Category extends BaseController {
    
}

/* non mapped Class
Category:
 * CategoryFunctionAttr
 * CategoryInvisibility
 * CategoryCustomerGroup
 */