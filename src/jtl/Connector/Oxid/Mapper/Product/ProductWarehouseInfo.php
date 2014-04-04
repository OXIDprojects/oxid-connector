<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of ProductWarehouseInfo
 */
class ProductWarehouseInfo extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ProductWarehouseInfo",
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_productId" => "OXID",
                    "_stockLevel" => "OXSTOCK",
                    "_inflowDate" => null
                ),
            "mapPush" => array
                (
                    "OXID" => "_productId",
                    "OXSTOCK" => "_stockLevel",
                    "OXDELIVERY" => "_inflowDate"
                )
        );
    
    public function _inflowDate($data)
    {
        return $this->stringToDateTime($data['OXDELIVERY']);
    }
}

/* non mapped properties
ProductWarehouseInfo:
 * _warehouseId
 * _inflowQuantity
 */