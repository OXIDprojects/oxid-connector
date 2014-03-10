<?php
namespace jtl\Connector\Oxid\Mapper\CustomerOrder;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerOrderContainer;

/**
 * Summary of CustomerOrderShippingAddress
 */
class CustomerOrderShippingAddress extends BaseMapper
{
    protected $_config = array
    (
     "model" => "\\jtl\\Connector\\Model\\CustomerOrderShippingAddress",
        "table" => "oxorder",
        "mapPull" => array(
            "_id" => "OXID",
            "_customerId" => "OXUSERID",
            "_salutation" => "OXDELSAL",
            "_firstName" => "OXDELFNAME",
            "_lastName" => "OXDELLNAME",
            "_company" => "OXDELCOMPANY",
            "_deliveryInstruction" => "OXDELADDINFO",
            "_street" => "OXDELSTREET", // OXDELSTREETNR
            "_zipCode" => "OXDELZIP",
            "_city" => "OXDELCITY",
            "_state" => "OXDELSTATEID",
            "_countryIso" => "OXDELCOUNTRYID",
            "_phone" => "OXDELFON",
            "_fax" => "OXDELFAX"
        )
    );
}
/* non mapped properties
CustomerOrderShippingAddress:
_title
_extraAddressLine
_mobile
_eMail



 */