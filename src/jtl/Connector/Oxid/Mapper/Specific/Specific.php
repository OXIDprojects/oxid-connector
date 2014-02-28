<?php
namespace jtl\Connector\Oxid\Mapper\Specific;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\SpecificContainer AS Container;

/**
 * Summary of Specific
 */
class Specific
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Specific",
            "table" => "oxattribute",
            "pk" => "OXID",
            "mapPull" => array(
                "_id" => "OXID",
                "_name" => "OXTITLE"
            )
        );
    
    //public function fetchAll($container,$type,$params=null)
    //{
    //    $dbResult = $this->_db->query("SELECT * FROM oxattribute LIMIT {$params['offset']},{$params['limit']}");
        
    //    var_dump($dbResult);
        
    //}
}


// non mapped properties
/*
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