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
            "_configItemId" => "OXSELVARIANT",
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