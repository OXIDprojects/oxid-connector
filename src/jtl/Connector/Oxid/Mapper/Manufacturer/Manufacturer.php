<?php
namespace jtl\Connector\Oxid\Mapper\Manufacturer;

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
            "table" => "oxmanufacturers",
            "pk" => "OXID",
            "mapPull" => array
            (
                "_id" => "OXID",
                "_name" => "OXTITLE"
            )
        );
    
    public function getAvailableCount()
    {
        $oxidConf = new Config();
        
        $sqlCount = $this->_db->query(" SELECT COUNT(*) FROM oxmanufacturers;");

        return $sqlCount;
    }
}

/* non mapped properties
Manufacturer:
 * _www
 * _sort 
 * _urlPath
 */