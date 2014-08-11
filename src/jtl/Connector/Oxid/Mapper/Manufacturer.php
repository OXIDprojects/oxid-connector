<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Model\Identity;
use jtl\Connector\Oxid\Mapper\BaseMapper;

class Manufacturer extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxmanufacturers",
            "pk" => "OXID",
            "mapPull" => array
            (
                "id" => "OXID",
                "name" => "OXTITLE"
            ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXTITLE" => "_name"
            )
        ); 
}