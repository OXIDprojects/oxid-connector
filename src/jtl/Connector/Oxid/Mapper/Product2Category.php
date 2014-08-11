<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class Product2Category extends BaseMapper
{
    protected $mapperConfig = array
        (
            "query" => "SELECT * FROM oxobject2category ORDER BY OXCATNID ASC",
            "table" => "oxobject2category",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "id" => "OXID",
                    "categoryId" => "OXCATNID",
                    "productId" => "OXOBJECTID"
                ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXCATNID" => "_categoryId",
                "OXOBJECTID" => "_productId"
            )   
        );
}