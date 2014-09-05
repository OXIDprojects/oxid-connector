<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class CustomerOrder extends BaseMapper
{
    protected $mapperConfig = array
    (
        "table" => "oxorder",
        "mapPull" => array(
            "customerId" => "OXUSERID",
            "id" => "OXID",
            "created" => null,
            "credit" => "OXVOUCHERDISCOUNT",
            "currencyIso" => "OXCURRENCY",
            "estimatedDeliveryDate" => null,
            "ip" => "OXIP",
            "localeName" => "OXLANG",
            "note" => "OXREMARK",
            "orderNumber" => "OXORDERNR",
            "paymentDate" => null,
            "paymentModuleCode" => "OXPAYMENTID",
            "shippingDate" => null,
            "shippingMethodCode" => "OXDELTYPE",
            "shippingMethodName" => "OXDELTYPE",
            "totalSum" => "OXTOTALNETSUM",
            "status" => null,
            "paymentStatus" => null,
            "tracking" => "OXTRACKCODE",
            "trackingURL" => "OXTRACKCODE",
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
    
    public function created($data)
    {   
        return $this->stringToDateTime($data['OXORDERDATE']);
    }
    
    public function estimatedDeliveryDate($data)
    {
        return $this->stringToDateTime($data['OXORDERDATE']);
    }
    
    public function paymentDate($data)
    {
        return $this->stringToDateTime($data['OXPAID']);
    }
    
    public function shippingDate($data)
    {
        return $this->stringToDateTime($data['OXSENDDATE']);
    }  
    
    public function status($data)
    {   
        switch ($data['OXTRANSSTATUS']) {
            case "ORDERFOLDER_NEW":
                return "new";
                break;
            case "ORDERFOLDER_FINISHED":
                return "completed";
                break;           
            case "ORDERFOLDER_PROBLEMS":
                return "cancelled";
                break;
        };
    }
    
    public function paymentStatus($data)
    {   
        switch ($data['OXTRANSSTATUS']) {
            case "OK":
                return "completed";
                break;
            case "NOT_FINISHED":
                return "unpaid";
                break;           
            case "ERROR":
                return "unpaid";
                break;
        };
    }
    
}