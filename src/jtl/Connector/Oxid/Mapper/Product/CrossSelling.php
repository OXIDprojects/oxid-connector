<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of CrossSelling
 */
class CrossSelling extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\CrossSelling",
            "table" => "oxobject2article",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_id" => "OXID",
                    "_crossSellingProductId" => "OXARTICLENID",
                    "_productId" => "OXOBJECTID"
                )
        );
}

/* non mapped properties
CrossSelling:
 * _crossSellingGroupId
 */