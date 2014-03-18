<?php
namespace jtl\Connector\Oxid\Mapper\GlobalData;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\GlobalDataContainer;

/**
 * Summary of ShippingClass
 */
class ShippingClass extends BaseMapper
{
protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ShippingClass",
            "table" => "oxdeliveryset",
            "pk" => "OXID",
            "mapPull" => array(
                "_id" => "OXID",
                "_name" => "OXTITLE"
            )
        );
}