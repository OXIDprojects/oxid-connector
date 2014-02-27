<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Core\Rpc\Error;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Connector\Transaction\Handler as TransactionHandler;
use \jtl\Connector\Result\Action;
use \jtl\Connector\Oxid\Mapper\Product as ProductMapper;
use \jtl\Connector\Oxid\Controller\BaseController;
use \jtl\Core\Model\QueryFilter;

class Product extends BaseController {    
    
    public function commit($params,$trid) {
        $action = new Action();
        $action->setHandled(true);
        
        try {
            $container = TransactionHandler::getContainer($this->getMethod()->getController(), $trid);
            
            $productMapper = new ProductMapper();
            
            $result = new TransactionResult();
            $result->setTransactionId($trid);
            
            if($productMapper->updateAll($container)) {
                $action->setResult($result->getPublic());
            }
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