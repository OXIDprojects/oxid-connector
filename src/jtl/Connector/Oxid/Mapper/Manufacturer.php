<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ManufacturerContainer;

/**
 * Summary of Manufacturer
 */
class Manufacturer extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Manufacturer",
            "table" => "",
            "mapPull" => array()
        );
}

