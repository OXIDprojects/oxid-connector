<?php
/**
 * @copyright 2010-2013 JTL-Software GmbH
 * @package jtl\Connector\Magento
 */
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Core\Rpc\Error;
use \jtl\Core\Utilities\className;
use \jtl\Connector\Magento\Mapper\Product as ProductMapper;
use \jtl\Connector\ModelContainer\ProductContainer;
use \jtl\Connector\Model\Statistic;
use \jtl\Connector\Result\Action;
use \jtl\Connector\Transaction\Handler as TransactionHandler;

/**
 * Description of Product
 *
 * @access public
 * @author Christian Spoo <christian.spoo@jtl-software.com>
 */
class Product extends AbstractController
{
    public function commit($params, $trid)
    {
        
    }

    public function delete($params)
    {
        
    }

    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try {
            $mapper = new ProductMapper();
            $products = $mapper->pull();
            
            $action->setResult($products);
        }
        catch (\Exception $e) {
            error_log(var_export($e, true));
            $err = new Error();
            $err->setCode(31337); //$e->getCode());
            $err->setMessage('Internal error'); //$e->getMessage());
            $action->setError($err);
        }
        
        return $action;
    }

    public function push($params)
    {
        
    }

    public function statistic($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try {
            $mapper = new ProductMapper();
            
            $statistic = new Statistic();
            $statistic->_controllerName = lcfirst(className::getFromNS(get_called_class()));
            $statistic->_available = $mapper->getAvailableCount();
            $statistic->_pending = 0;

            $action->setResult($statistic->getpublic(array('_fields', '_isEncrypted')));
        }
        catch (\Exception $exc) {
            $err = new Error();
            $err->setCode($exc->getCode());
            $err->setMessage($exc->getMessage());
            $action->setError($err);
        }
        
        return $action;
    }
    
    /**
     * Summary of pull
     * @param $params
     */
    public function pull($params){
        $filter = new QueryFilter(); // Regulierung der Abfrage, damit nicht alle auf einmal gezogen werden.
        $filter->set($params);
        $products = $mapper->fetchAll($filter);
    }
}
