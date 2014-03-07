<?php
namespace jtl\Connector\Oxid\Mapper\Specific;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\SpecificContainer AS Container;

/**
 * Summary of Specific
 */
class Specific extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Specific",
            "table" => "oxattribute",
            "pk" => "OXID",
            "mapPull" => array(
                "_id" => "OXID"
            )
         );
}


/* non mapped properties
Specific:
    global
    sort
    type
  
SpecificI18n:
    SpecificId 
    localeName
    name
  
SpecificValueI18n:
    localeName
    
 */