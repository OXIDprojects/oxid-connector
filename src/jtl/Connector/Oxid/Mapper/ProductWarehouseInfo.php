<?php
namespace jtl\Connector\Oxid\Mapper;

use jtl\Connector\Oxid\Mapper\BaseMapper;

class ProductWarehouseInfo extends BaseMapper
{
    protected $mapperConfig = array
        (
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "productId" => "OXID",
                    "stockLevel" => "OXSTOCK",
                    "inflowDate" => null
                ),
            "mapPush" => array
                (
                    "OXID" => "_productId",
                    "OXSTOCK" => "_stockLevel",
                    "OXDELIVERY" => "_inflowDate"
                )
        );
    
    public function inflowDate($data)
    {
        return $this->stringToDateTime($data['OXDELIVERY']);
    }
}

/* non mapped properties
ProductWarehouseInfo:
 * _warehouseId
 * _inflowQuantity
 */