<?php
namespace jtl\Connector\Oxid\Controller;

use \jtl\Core\Result\Transaction as TransactionResult;
use \jtl\Connector\Result\Action;
use \jtl\Connector\ModelContainer\CustomerOrderContainer;

use \jtl\Core\Rpc\Error;
use \jtl\Core\Exception\TransactionException;
use \jtl\Core\Exception\DatabaseException;
use \jtl\Connector\Transaction\Handler as TransactionHandler;
use \jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrder as CustomerOrderMapper;
use \jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderShippingAddress as CustomerOrderShippingAddressMapping;
use \jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderBillingAddress as CustomerOrderBillingAddressMapping;
//use \jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoMapper;
use \jtl\Connector\Oxid\Controller\BaseController;
use \jtl\Core\Model\QueryFilter;

class CustomerOrder extends BaseController
{
    public function pull($params)
    {
        $action = new Action();
        $action->setHandled(true);
        
        try
        {
            $container = new CustomerOrderContainer();
            
            $customerOrderMapper = new CustomerOrderMapper();
            $customerOrderShippingAddressMapping = new CustomerOrderShippingAddressMapping();
            $customerOrderBillingAddressMapping = new CustomerOrderBillingAddressMapping();
            //$customerOrderPaymentInfoMapper = new CustomerOrderPaymentInfoMapper();
            
            $customerOrderMapper->fetchAll($container, 'customer_order');
            $customerOrderShippingAddressMapping->fetchAll($container, 'customer_order_shipping_address');
            $customerOrderBillingAddressMapping->fetchAll($container, 'customer_order_billing_address');
            //$customerOrderPaymentInfoMapping->fetchAll($container, 'customer_oredr_payment_info', $customerOrderPaymentInfoMapping->getPaymentInfo());
            
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