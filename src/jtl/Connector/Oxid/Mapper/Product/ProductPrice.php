<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of ProductPrice
 */
class ProductPrice extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\ProductPrice",
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_productId" => "OXID",
                    "_netPrice" => "TODO", //ToDo
                    "_quantity" => "TODO" // ToDo
                )
        );
    
    public function _netPrice($data) {
    	
        
        return $NettoPrice;
    }
}

/* non mapped properties
ProductPrice:
_customerGroupId
 */