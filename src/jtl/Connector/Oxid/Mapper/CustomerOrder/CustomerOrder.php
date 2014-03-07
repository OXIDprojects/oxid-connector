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
            "_ratingNotificationDate" => "",
            "_tracking" => "OXTRACKCODE",
            "_note" => "OXREMARK",
            "_trackingURL" => "OXTRACKCODE",
            "_ip" => "OXIP",
            "_status" => "OXBILLSTATEID",
            "_created" => "OXORDERDATE",
            "_paymentModuleId" => "OXPAYMENTID"
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