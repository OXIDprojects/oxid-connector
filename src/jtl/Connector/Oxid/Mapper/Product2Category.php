<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of Product2Category
 */
class Product2Category extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Product2Category",
            "query" => "SELECT * FROM oxobject2category ORDER BY OXCATNID ASC",
            "table" => "oxobject2category",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_id" => "OXID",
                    "_categoryId" => "OXCATNID",
                    "_productId" => "OXOBJECTID"
                ),
            "mapPush" => array(
                "OXID" => "_id",
                "OXCATNID" => "_categoryId",
                "OXOBJECTID" => "_productId"
            )   
        );
}