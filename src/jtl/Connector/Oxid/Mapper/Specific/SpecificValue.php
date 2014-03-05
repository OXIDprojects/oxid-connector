<?php
namespace jtl\Connector\Oxid\Mapper\Specific;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\SpecificContainer AS Container;

/**
 * Summary of SpecificValue
 */
class SpecificValue extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\SpecificValue",
            "table" => "oxattribute",
            "pk" => "OXID",
            "mapPull" => array(
                "_specificId" => "OXID",
            )
         );
}