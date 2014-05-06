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
                "_netPrice" => null
            ),
            "mapPush" => array
            (
                "OXID" => "_productId",
                "OXPRICE" => null
            )
        );
    
    public function _netPrice($data) {
    	
        $oxPrice = $data['OXPRICE'];
        
        if($this->checkEnterNetPrice()){
            $netPrice = $oxPrice;
        }else{
            if(isset($data['OXVAT'])){
                $netPrice = round($oxPrice / "1.{$data['OXVAT']}", 2);
            }else{
                $netPrice = round($oxPrice / "1.{$this->getDefaultVAT()}", 2);
            }
        }
        $netPrice = floatval($netPrice);
        
        return $netPrice;
    }
    
    
    public function OXPRICE($data)
    {
        //Testen
        return $data['_netPrice'] * "1,{$data['_vat']}";
    }
    
    
}

/* non mapped properties
ProductPrice:
_customerGroupId
_quantity
 */