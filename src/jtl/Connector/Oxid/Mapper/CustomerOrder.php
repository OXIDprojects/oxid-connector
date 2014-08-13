<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class CustomerOrder extends BaseMapper
{
    protected $mapperConfig = array
    (
        "table" => "oxorder",
        "mapPull" => array(
            "id" => "OXID",
            "customerId" => "OXUSERID",
            "shippingMethodCode" => "OXDELTYPE",
            "localeName" => "OXLANG",
            "currencyIso" => "OXCURRENCY",
            "estimatedDeliveryDate" => null,
            "credit" => "OXVOUCHERDISCOUNT",
            "totalSum" => "OXTOTALBRUTSUM",
            "shippingMethodName" => "OXDELTYPE",
            "orderNumber" => "OXORDERNR",
            "shippingDate" => null,
            "paymentDate" => null,
            "tracking" => "OXTRACKCODE",
            "note" => "OXREMARK",
            "trackingURL" => "OXTRACKCODE",
            "ip" => "OXIP",
            "status" => "OXBILLSTATEID",
            "created" => null,
            "paymentModuleCode" => "OXPAYMENTID",
            //"billingAddress" => "CustomerOrderBillingAddress|addBillingAddress",
            "shippingAddress" => "CustomerOrderShippingAddress|addShippingAddress",
            "paymentInfo" => "CustomerOrderPaymentInfo|addPaymentInfo",
            "items" => "CustomerOrderItem|addItem"
            
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
    
    public function estimatedDeliveryDate($data)
    {
        return $this->stringToDateTime($data['OXORDERDATE']);
    }
    
    public function shippingDate($data)
    {
        return $this->stringToDateTime($data['OXSENDDATE']);
    }
    
    public function paymentDate($data)
    {
        return $this->stringToDateTime($data['OXPAID']);
    }
    
    public function created($data)
    {   
        return $this->stringToDateTime($data['OXORDERDATE']);
    }
    
}