<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\CustomerContainer;

/**
 * Summary of Customer
 */
class Customer extends BaseMapper
{
    protected $_config = array
    (
        "model" => "\\jtl\\Connector\\Model\\Customer",
        "table" => "",
        "mapPull" => array()
    );
}