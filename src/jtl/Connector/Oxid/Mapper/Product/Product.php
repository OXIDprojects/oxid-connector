<?php
namespace jtl\Connector\Oxid\Mapper\Product;

use jtl\Connector\Oxid\Mapper\BaseMapper;
use jtl\Connector\Oxid\Config\Loader\Config;
use jtl\Connector\ModelContainer\ProductContainer;

/**
 * Summary of Product
 */
class Product extends BaseMapper
{
    protected $_config = array
        (
            "model" => "\\jtl\\Connector\\Model\\Product",
            "table" => "oxarticles",
            "PK" => "OXID",
            "mapPull" => array
                (
                    "_id" => "OXID",
                    "_masterProductId" => "OXPARENTID",
                    "_manufacturerId" => "OXMANUFACTURERID",
                    "_unitId" => "OXUNITNAME",
                    "_basePriceUnitId" => null,
                    "_sku" => "OXARTNUM",
                    "_stockLevel" => "OXSTOCK",
                    "_vat" => null,
                    "_minimumOrderQuantity" => "OXUNITQUANTITY",
                    "_ean" => "OXEAN",
                    "_productWeight" => "OXWEIGHT",
                    "_recommendedRetailPrice" => "OXTPRICE",
                    "_keywords" => "OXSEARCHKEYS",
                    "_sort" => "OXSORT",
                    "_created" => "OXINSERT",
                    "_availableFrom" => "OXACTIVEFROM",
                    "_manufacturerNumber" => "OXMPN",
                    "_isMasterProduct" => null
                )
        );
    
    public function _isMasterProduct($data)
    {            
            $oxidConf = new Config();
            
            $sqlResult = $this->_db->query("SELECT Count(OXPARENTID) AS ParentCount FROM oxid_michele.oxarticles
                                            WHERE OXPARENTID = '{$data['OXID']}';");
            
            if(($sqlResult[0]['ParentCount'] != 0))
            {
                return true;    
            }            
        return false;
    }   
    
    //_vat = OXVAT(Spezielle MwSt) Normale MwSt in Currency-Blob "oxconfig"
    //_basePriceUnitId = Preis wird bereits in der Artikel Tabelle vergeben.
    //_basePriceDivisor ?
    
    //_isMasterProduct Wenn Artikel in ParentId eingetragen wurde ist der Artikel ein Materartikel in Oxid
}

/* non mapped properties
Product:
_deliveryStatus
_shippingClassId
_note
_isTopProduct
_shippingWeight
_isNew
_considerStock
_permitNegativeStock
_considerVariationStock
_isDivisible
_considerBasePrice
_serialNumber
_isbn
_asin
_unNumber
_hazardIdNumber
_taric
_takeOffQuantity
_setArticleId
_upc
_originCountry
_epid
_productTypeId
_inflowQuantity
_inflowDate
_bestBefore
_supplierStockLevel
_supplierDeliveryTime
*/