<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class CrossSelling extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxobject2article",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "id" => "OXID",
                    "crossSellingProductId" => "OXARTICLENID",
                    "productId" => "OXOBJECTID"
                ),
                "mapPush" => array(                
                    "OXID" => "_id",
                    "OXARTICLENID" => "_crossSellingProductId",
                    "OXOBJECTID" => "_productId"
                )
        );
}