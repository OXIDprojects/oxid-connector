<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class ShippingClass extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxdeliveryset",
            "pk" => "OXID",
            "mapPull" => array(
                "id" => "OXID",
                "name" => "OXTITLE"
            ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXTITLE" => "_name"
            )
        );
}