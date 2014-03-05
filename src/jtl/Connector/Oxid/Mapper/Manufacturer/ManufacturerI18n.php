<?php
namespace jtl\Connector\Oxid\Mapper\Manufacturer;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ManufacturerContainer;

/**
 * Summary of ManufacturerI18n
 */
class ManufacturerI18n extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ManufacturerI18n",
            "table" => "oxmanufacturers",
            "pk" => "OXID",
            "mapPull" => array
            (
                "_manufacturerId" => "OXID"
            )
        );
}