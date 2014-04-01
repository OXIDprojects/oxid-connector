<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerOrderContainer;

/**
 * Summary of CustomerOrderItem
 */
class CustomerOrderItem extends BaseMapper
{
    protected $_config = array
    (
        "model" => "\\jtl\\Connector\\Model\\CustomerOrderItem",
        "table" => "oxorderarticles",
        "mapPull" => array(
            "_id" => "OXID",
            "_productId" => "OXARTID",
            "_customerOrderId" => "OXORDERID",
            "_name" => "OXTITLE",
            "_price" => "OXPRICE",
            "_vat" => "OXVAT",
            "_quantity" => "OXAMOUNT",
            "_configItemId" => "OXSELVARIANT"
        ),
        "mapPush" => array(
            "OXID" => "_id",
            "OXARTID" => "_productId",
            "OXORDERID" => "_customerOrderId",
            "OXTITLE" => "_name",
            "OXPRICE" => "_price",
            "OXVAT" => "_vat",
            "OXAMOUNT" => "_quantity",
            "OXSELVARIANT" => "_configItemId"
        )
    );
}
/* non mapped properties
CustomerOrderItem:
 * - _sku  -what is SKU?
 * - _shippingClassId
 * - _type
 * - _unique
 */