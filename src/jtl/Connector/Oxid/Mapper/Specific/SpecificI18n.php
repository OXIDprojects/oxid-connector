<?php
namespace jtl\Connector\Oxid\Mapper\Specific;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\SpecificContainer AS Container;

/**
 * Summary of SpecificI18n
 */
class SpecificI18n extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\SpecificI18n",
            "table" => "oxattribute",
            "pk" => "OXID",
            "mapPull" => array(
                "_specificId" => "OXID",
                "_name" => "OXTITLE"
            )
         );
}

/* non mapped properties
SpecificI18n:
 
 */