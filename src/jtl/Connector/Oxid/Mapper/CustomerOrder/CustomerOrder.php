<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerOrderContainer;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderItem as CustomerOrderItemMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderPaymentInfo as CustomerOrderPaymentInfoMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderShippingAddress as CustomerOrderShippingAddressMapper;
use jtl\Connector\Oxid\Mapper\CustomerOrder\CustomerOrderBillingAddress as CustomerOrderBillingAddressMapper;

/**
 * Summary of CustomerOrder
 */
class CustomerOrder extends BaseMapper
{
    protected $_config = array
    (
        "model" => "\\jtl\\Connector\\Model\\CustomerOrder",
        "table" => "oxorder",
        "mapPull" => array(
            "_id" => "OXID",
            "_customerId" => "OXUSERID",
            "_shippingMethodCode" => "OXDELTYPE",
            "_localeName" => "OXLANG",
            "_currencyIso" => "OXCURRENCY",
            "_estimatedDeliveryDate" => null,
            "_credit" => "OXVOUCHERDISCOUNT",
            "_totalSum" => "OXTOTALBRUTSUM",
            "_shippingMethodName" => "OXDELTYPE",
            "_orderNumber" => "OXORDERNR",
            "_shippingDate" => null,
            "_paymentDate" => null,
            "_tracking" => "OXTRACKCODE",
            "_note" => "OXREMARK",
            "_trackingURL" => "OXTRACKCODE",
            "_ip" => "OXIP",
            "_status" => "OXBILLSTATEID",
            "_created" => null,
            "_paymentModuleCode" => "OXPAYMENTID"
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXUSERID" => "_customerId",
            "OXDELTYPE" => "_shippingMethodCode",
            "OXLANG" => "_localeName",
            "OXCURRENCY" => "_currencyIso",
            "OXORDERDATE" => "_estimatedDeliveryDate",
            "OXVOUCHERDISCOUNT" => "_credit",
            "OXARTVATPRICE1" => "_totalSum",
            "OXDELTYPE" => "_shippingMethodName",
            "OXMOBFON" => "_orderNumber",
            "OXSENDDATE" => "_shippingDate",
            "OXPAID" => "_paymentDate",
            "OXTRACKCODE" => "_tracking",
            "OXREMARK" => "_note",
            "OXTRACKCODE" => "_trackingURL",
            "OXIP" => "_ip",
            "OXBILLSTATEID" => "_status",
            "OXORDERDATE" => "_created",
            "OXPAYMENTID" => "_paymentModuleCode"
        )
    );
    
    public function fetchAll($container=null,$type=null,$params=array()) {
        $result = [];
        
        $dbResult = $this->_db->query("SELECT * FROM oxorder ORDER BY oxorder.OXID LIMIT {$params['offset']},{$params['limit']}");
        
        foreach($dbResult as $data) {
    	    $container = new CustomerOrderContainer();
    		
    		$model = $this->generate($data);
    		
    		$container->add('customer_order', $model->getPublic(),false);
    		
            //add BillingAddress
            $customerOrderBillingAddressMapper = new CustomerOrderBillingAddressMapper();
            $customerOrderBillingAddressMapper->fetchAll($container,'customer_order_billing_address', array('data' => $data));
            
    		//add Item
    		$customerOrderItemMapper = new CustomerOrderItemMapper();
    		$customerOrderItemMapper->fetchAll($container,'customer_order_item', $customerOrderItemMapper->getOrderItem(array('OXID' => $model->_id)));
            
            //add PaymentInfo
            $customerOrderPaymentInfoMapper = new CustomerOrderPaymentInfoMapper();
            $customerOrderPaymentInfoMapper->fetchAll($container,'customer_order_payment_info', $customerOrderPaymentInfoMapper->getPaymentInfo(array('OXPAYMENTID' => $model->_paymentModuleCode)));
                       
            //add ShippingAddress
            $customerOrderShippingAddressMapper = new CustomerOrderShippingAddressMapper();
            $customerOrderShippingAddressMapper->fetchAll($container,'customer_order_shipping_address', $customerOrderShippingAddressMapper->getOrderShippingAddress(array('OXID' => $model->_id)));
            
            $result[] = $container->getPublic(array('items'));
            
            
            
    	} 
        return $result;
    }
    
    public function _estimatedDeliveryDate($data)
    {
        return $this->stringToDateTime($data['OXORDERDATE']);
    }
    
    public function _shippingDate($data)
    {
        return $this->stringToDateTime($data['OXSENDDATE']);
    }
    
    public function _paymentDate($data)
    {
        return $this->stringToDateTime($data['OXPAID']);
    }
    
    public function _created($data)
    {   
        return $this->stringToDateTime($data['OXORDERDATE']);
    }
    
}
/* non mapped properties
CustomerOrder:
_shippingAddressId
_billingAddressId
_session
_shippingInfo
_ratingNotificationDate
_carrierName
_isFetched
 */