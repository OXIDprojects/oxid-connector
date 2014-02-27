<?php
namespace jtl\Connector\Oxid\Mapper;

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
            "table" => "",
            "mapPull" => array()
        );
}