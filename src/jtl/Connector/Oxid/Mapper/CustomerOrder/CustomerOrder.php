<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerOrderContainer;

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
            "_shippingMethodId" => "OXDELTYPE",
            "_localeName" => "OXLANG",
            "_currencyIso" => "OXCURRENCY",
            "_estimatedDeliveryDate" => "OXORDERDATE",
            "_credit" => "OXVOUCHERDISCOUNT",
            "_totalSum" => "OXARTVATPRICE1",
            "_shippingMethodName" => "OXDELTYPE",
            "_orderNumber" => "OXMOBFON",
            "_shippingDate" => "OXSENDDATE",
            "_paymentDate" => "OXPAID",
            "_tracking" => "OXTRACKCODE",
            "_note" => "OXREMARK",
            "_trackingURL" => "OXTRACKCODE",
            "_ip" => "OXIP",
            "_status" => "OXBILLSTATEID",
            "_created" => "OXORDERDATE",
            "_paymentModuleId" => "OXPAYMENTID"
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXUSERID" => "_customerId",
            "OXDELTYPE" => "_shippingMethodId",
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
            "OXPAYMENTID" => "_paymentModuleId"
        )
    );
}
/* non mapped properties
CustomerOrder:
_shippingAddressId
_billingAddressId
_session
_shippingInfo
_ratingNotificationDate
_logistic
_isFetched
 */